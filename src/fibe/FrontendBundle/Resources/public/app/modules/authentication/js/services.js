angular.module('authenticationApp').factory('userFactory', ['$resource',
    function($resource){
        return $resource(
            globalConfig.api.urls.login,
            {'id': '@id'},
            {
                get: {method:'GET',  params: {}, isArray:false},
                login: {method:'POST', url: globalConfig.api.urls.login, isArray:false},
                show: {method:'GET', isArray:false},
                list: {method:'GET', url: globalConfig.api.urls.organizations+'.json', params:{}, isArray:true}
            }
        );
    }]);


angular.module('authenticationApp').factory('globalHttpInterceptor', ['$q', '$cookieStore', 'tokenHandler',
    function($q, $cookieStore, tokenHandler) {
        return {
            'request' : function(config){
                config.headers["X-WSSE"] = tokenHandler.getCredentials();
                return config;
            },
            'response': function(response) {
                return response || $q.when(response);
            },

            'responseError': function(rejection) {
                if (rejection.status == "401") {
                    $rootScope.$broadcast('globalHttpInterceptor:401', {});
                }
                return $q.reject(rejection);
            }
        };
}]);



angular.module('authenticationApp').factory('tokenHandler', ['$cookieStore', 'GLOBAL_CONFIG', 'Base64', function($cookieStore, GLOBAL_CONFIG, Base64) {
    var tokenHandler = {};
    var token = 'none';

    tokenHandler.set = function( newToken ) {
        token = newToken;
    };

    tokenHandler.get = function() {
        return token;
    };

    tokenHandler.getCredentials = function () {
        // Check if token is registered in cookies

        // Define variables from cookie cache
        var username = $cookieStore.get('username') || null;
        var digest = $cookieStore.get('digest') || null;
        var created = $cookieStore.get('created') || null;


        // Return generated token
        return 'UsernameToken Username="'+username+'", PasswordDigest="'+digest+'", Nonce="'+this.genNounce()+'", Created="'+created+'"';
    };

    tokenHandler.setCredentials = function (username, secret) {


        // Creation time of the token
        var created = formatDate(new Date());

        // Generating digest from secret, creation and seed
        var hash = CryptoJS.SHA1(nonce+created+secret);

        var digest = hash.toString(CryptoJS.enc.Base64);


        // Save token in cookies
        $cookieStore.put('username', username);
        $cookieStore.put('digest', digest);
        $cookieStore.put('created', created);
    }

    tokenHandler.genNounce = function () {
        // Create token for backend communication
        var seed = Math.floor( Math.random() * 1000 )+'';
        var nonce = CryptoJS.MD5( seed ).toString(CryptoJS.enc.Hex);
        return Base64.encode(nonce);
    }

    // Token Reinitializer
    tokenHandler.clearCredentials = function () {
        // Clear token from cache
        $cookieStore.remove('username');
        $cookieStore.remove('digest');
        $cookieStore.remove('nonce');
        $cookieStore.remove('created');

    };



    // Date formater to UTC
    var formatDate = function (d) {
        // Padding for date creation
        var pad = function (num) {
            return ("0" + num).slice(-2);
        };

        return [d.getUTCFullYear(),
            pad(d.getUTCMonth() + 1),
            pad(d.getUTCDate())].join("-") + "T" +
            [pad(d.getUTCHours()),
                pad(d.getUTCMinutes()),
                pad(d.getUTCSeconds())].join(":") + "Z";
    };

    return tokenHandler;
}])



angular.module('authenticationApp').factory('Base64', function() {
    var keyStr = 'ABCDEFGHIJKLMNOP' +
        'QRSTUVWXYZabcdef' +
        'ghijklmnopqrstuv' +
        'wxyz0123456789+/' +
        '=';
    return {
        encode: function (input) {
            var output = "";
            var chr1, chr2, chr3 = "";
            var enc1, enc2, enc3, enc4 = "";
            var i = 0;

            do {
                chr1 = input.charCodeAt(i++);
                chr2 = input.charCodeAt(i++);
                chr3 = input.charCodeAt(i++);

                enc1 = chr1 >> 2;
                enc2 = ((chr1 & 3) << 4) | (chr2 >> 4);
                enc3 = ((chr2 & 15) << 2) | (chr3 >> 6);
                enc4 = chr3 & 63;

                if (isNaN(chr2)) {
                    enc3 = enc4 = 64;
                } else if (isNaN(chr3)) {
                    enc4 = 64;
                }

                output = output +
                    keyStr.charAt(enc1) +
                    keyStr.charAt(enc2) +
                    keyStr.charAt(enc3) +
                    keyStr.charAt(enc4);
                chr1 = chr2 = chr3 = "";
                enc1 = enc2 = enc3 = enc4 = "";
            } while (i < input.length);

            return output;
        },

        decode: function (input) {
            var output = "";
            var chr1, chr2, chr3 = "";
            var enc1, enc2, enc3, enc4 = "";
            var i = 0;

            // remove all characters that are not A-Z, a-z, 0-9, +, /, or =
            var base64test = /[^A-Za-z0-9\+\/\=]/g;
            if (base64test.exec(input)) {
                alert("There were invalid base64 characters in the input text.\n" +
                    "Valid base64 characters are A-Z, a-z, 0-9, '+', '/',and '='\n" +
                    "Expect errors in decoding.");
            }
            input = input.replace(/[^A-Za-z0-9\+\/\=]/g, "");

            do {
                enc1 = keyStr.indexOf(input.charAt(i++));
                enc2 = keyStr.indexOf(input.charAt(i++));
                enc3 = keyStr.indexOf(input.charAt(i++));
                enc4 = keyStr.indexOf(input.charAt(i++));

                chr1 = (enc1 << 2) | (enc2 >> 4);
                chr2 = ((enc2 & 15) << 4) | (enc3 >> 2);
                chr3 = ((enc3 & 3) << 6) | enc4;

                output = output + String.fromCharCode(chr1);

                if (enc3 != 64) {
                    output = output + String.fromCharCode(chr2);
                }
                if (enc4 != 64) {
                    output = output + String.fromCharCode(chr3);
                }

                chr1 = chr2 = chr3 = "";
                enc1 = enc2 = enc3 = enc4 = "";

            } while (i < input.length);

            return output;
        }
    };
})
