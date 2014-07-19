<?php

/* @WebProfiler/Profiler/base_js.html.twig */
class __TwigTemplate_c375e55ac58ffd0a4a88b5427adcf4175ad51140b733941975ddb921faba8335 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<script>/*<![CDATA[*/
    Sfjs = (function() {
        \"use strict\";

        var noop = function() {},

            profilerStorageKey = 'sf2/profiler/',

            request = function(url, onSuccess, onError, payload, options) {
                var xhr = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
                options = options || {};
                options.maxTries = options.maxTries || 0;
                xhr.open(options.method || 'GET', url, true);
                xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
                xhr.onreadystatechange = function(state) {
                    if (4 !== xhr.readyState) {
                        return null;
                    }

                    if (xhr.status == 404 && options.maxTries > 1) {
                        setTimeout(function(){
                            options.maxTries--;
                            request(url, onSuccess, onError, payload, options);
                        }, 500);

                        return null;
                    }

                    if (200 === xhr.status) {
                        (onSuccess || noop)(xhr);
                    } else {
                        (onError || noop)(xhr);
                    }
                };
                xhr.send(payload || '');
            },

            hasClass = function(el, klass) {
                return el.className && el.className.match(new RegExp('\\\\b' + klass + '\\\\b'));
            },

            removeClass = function(el, klass) {
                if (el.className) {
                    el.className = el.className.replace(new RegExp('\\\\b' + klass + '\\\\b'), ' ');
                }
            },

            addClass = function(el, klass) {
                if (!hasClass(el, klass)) {
                    el.className += \" \" + klass;
                }
            },

            getPreference = function(name) {
                if (!window.localStorage) {
                    return null;
                }

                return localStorage.getItem(profilerStorageKey + name);
            },

            setPreference = function(name, value) {
                if (!window.localStorage) {
                    return null;
                }

                localStorage.setItem(profilerStorageKey + name, value);
            };

        return {
            hasClass: hasClass,

            removeClass: removeClass,

            addClass: addClass,

            getPreference: getPreference,

            setPreference: setPreference,

            request: request,

            load: function(selector, url, onSuccess, onError, options) {
                var el = document.getElementById(selector);

                if (el && el.getAttribute('data-sfurl') !== url) {
                    request(
                        url,
                        function(xhr) {
                            el.innerHTML = xhr.responseText;
                            el.setAttribute('data-sfurl', url);
                            removeClass(el, 'loading');
                            (onSuccess || noop)(xhr, el);
                        },
                        function(xhr) { (onError || noop)(xhr, el); },
                        '',
                        options
                    );
                }

                return this;
            },

            toggle: function(selector, elOn, elOff) {
                var i,
                    style,
                    tmp = elOn.style.display,
                    el = document.getElementById(selector);

                elOn.style.display = elOff.style.display;
                elOff.style.display = tmp;

                if (el) {
                    el.style.display = 'none' === tmp ? 'none' : 'block';
                }

                return this;
            }
        }
    })();
/*]]>*/</script>
";
    }

    public function getTemplateName()
    {
        return "@WebProfiler/Profiler/base_js.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  70 => 26,  24 => 2,  68 => 14,  22 => 20,  1402 => 419,  1396 => 417,  1390 => 415,  1388 => 414,  1386 => 413,  1382 => 412,  1373 => 411,  1371 => 410,  1368 => 409,  1355 => 403,  1349 => 401,  1343 => 399,  1341 => 398,  1339 => 397,  1335 => 396,  1329 => 395,  1327 => 394,  1324 => 393,  1311 => 387,  1305 => 385,  1299 => 383,  1297 => 382,  1295 => 381,  1291 => 380,  1287 => 379,  1283 => 378,  1279 => 377,  1273 => 376,  1271 => 375,  1268 => 374,  1256 => 369,  1251 => 368,  1249 => 367,  1246 => 366,  1237 => 360,  1231 => 358,  1228 => 357,  1223 => 356,  1221 => 355,  1218 => 354,  1211 => 349,  1202 => 347,  1198 => 346,  1195 => 345,  1192 => 344,  1190 => 343,  1187 => 342,  1179 => 338,  1177 => 337,  1174 => 336,  1168 => 332,  1162 => 330,  1159 => 329,  1157 => 328,  1154 => 327,  1145 => 322,  1143 => 321,  1118 => 320,  1115 => 319,  1112 => 318,  1109 => 317,  1106 => 316,  1103 => 315,  1100 => 314,  1098 => 313,  1095 => 312,  1088 => 308,  1084 => 307,  1079 => 306,  1077 => 305,  1074 => 304,  1067 => 299,  1064 => 298,  1056 => 293,  1051 => 291,  1048 => 290,  1040 => 285,  1032 => 283,  1029 => 282,  1027 => 281,  1024 => 280,  1016 => 276,  1012 => 271,  1009 => 270,  1004 => 266,  979 => 260,  976 => 259,  973 => 258,  970 => 257,  967 => 256,  964 => 255,  961 => 254,  958 => 253,  955 => 252,  952 => 251,  950 => 250,  947 => 249,  934 => 241,  931 => 240,  923 => 236,  920 => 235,  918 => 234,  915 => 233,  903 => 229,  900 => 228,  897 => 227,  894 => 226,  892 => 225,  889 => 224,  881 => 220,  878 => 219,  865 => 213,  862 => 212,  860 => 211,  857 => 210,  849 => 206,  846 => 205,  841 => 203,  828 => 197,  825 => 196,  817 => 192,  814 => 191,  812 => 190,  809 => 189,  801 => 185,  798 => 184,  783 => 177,  780 => 176,  772 => 172,  769 => 171,  767 => 170,  764 => 169,  756 => 165,  753 => 164,  749 => 162,  746 => 161,  739 => 156,  729 => 155,  724 => 154,  721 => 153,  710 => 149,  707 => 148,  699 => 142,  697 => 141,  696 => 140,  695 => 139,  694 => 138,  689 => 137,  683 => 135,  680 => 134,  678 => 133,  675 => 132,  666 => 126,  658 => 124,  649 => 122,  643 => 120,  640 => 119,  619 => 113,  614 => 111,  596 => 106,  593 => 105,  576 => 101,  564 => 99,  557 => 96,  555 => 95,  529 => 92,  527 => 91,  524 => 90,  515 => 85,  512 => 84,  509 => 83,  503 => 81,  496 => 79,  493 => 78,  490 => 77,  480 => 75,  478 => 74,  464 => 71,  461 => 70,  459 => 69,  456 => 68,  450 => 64,  442 => 62,  437 => 61,  428 => 59,  426 => 58,  423 => 57,  414 => 52,  408 => 50,  403 => 48,  400 => 47,  388 => 42,  377 => 37,  374 => 36,  368 => 34,  366 => 33,  363 => 32,  355 => 27,  342 => 23,  337 => 22,  332 => 20,  316 => 16,  313 => 15,  293 => 6,  288 => 4,  285 => 3,  278 => 408,  276 => 393,  273 => 392,  271 => 374,  266 => 366,  263 => 365,  260 => 363,  253 => 342,  248 => 336,  245 => 335,  240 => 326,  233 => 304,  230 => 303,  227 => 301,  225 => 298,  220 => 290,  215 => 280,  210 => 270,  184 => 233,  179 => 224,  174 => 217,  169 => 210,  164 => 203,  159 => 196,  154 => 189,  149 => 182,  144 => 176,  139 => 169,  134 => 161,  129 => 148,  124 => 132,  109 => 105,  104 => 90,  94 => 57,  89 => 47,  84 => 41,  79 => 29,  74 => 20,  66 => 25,  1075 => 306,  1066 => 305,  1063 => 304,  1060 => 303,  1053 => 292,  1050 => 299,  1042 => 294,  1039 => 293,  1036 => 284,  1033 => 291,  1025 => 286,  1021 => 285,  1017 => 284,  1014 => 272,  1011 => 282,  1008 => 281,  1000 => 277,  998 => 273,  995 => 272,  992 => 271,  987 => 267,  982 => 261,  963 => 262,  960 => 261,  957 => 260,  954 => 259,  951 => 258,  948 => 257,  945 => 256,  942 => 255,  939 => 243,  936 => 242,  933 => 252,  930 => 251,  927 => 250,  919 => 244,  916 => 243,  913 => 242,  910 => 241,  902 => 237,  899 => 236,  896 => 235,  893 => 234,  890 => 233,  883 => 229,  876 => 218,  873 => 217,  870 => 226,  867 => 225,  864 => 224,  861 => 223,  853 => 219,  850 => 218,  847 => 217,  844 => 204,  836 => 212,  833 => 199,  830 => 198,  827 => 209,  819 => 205,  816 => 204,  813 => 203,  810 => 202,  802 => 198,  799 => 197,  796 => 183,  793 => 182,  785 => 178,  782 => 190,  779 => 189,  776 => 188,  768 => 184,  765 => 183,  762 => 182,  759 => 181,  751 => 163,  748 => 176,  745 => 175,  737 => 171,  734 => 170,  731 => 169,  728 => 168,  720 => 164,  717 => 163,  715 => 151,  712 => 150,  709 => 160,  704 => 157,  700 => 155,  690 => 154,  685 => 153,  682 => 152,  676 => 150,  673 => 149,  670 => 148,  667 => 147,  662 => 125,  657 => 141,  655 => 140,  654 => 123,  653 => 138,  652 => 137,  647 => 136,  641 => 134,  638 => 118,  635 => 117,  632 => 131,  627 => 128,  621 => 125,  617 => 112,  613 => 123,  609 => 122,  604 => 121,  598 => 107,  595 => 118,  592 => 117,  589 => 116,  574 => 112,  571 => 111,  568 => 110,  565 => 109,  550 => 94,  547 => 93,  544 => 103,  541 => 102,  536 => 99,  522 => 98,  511 => 96,  508 => 95,  501 => 80,  499 => 91,  491 => 89,  473 => 88,  470 => 73,  467 => 72,  458 => 81,  455 => 80,  452 => 79,  446 => 77,  444 => 76,  439 => 75,  436 => 74,  433 => 60,  424 => 71,  421 => 70,  419 => 69,  410 => 68,  407 => 67,  404 => 66,  398 => 62,  385 => 41,  381 => 58,  376 => 57,  373 => 56,  370 => 55,  365 => 52,  359 => 50,  353 => 48,  350 => 26,  347 => 46,  344 => 24,  334 => 41,  331 => 40,  328 => 39,  320 => 35,  317 => 34,  314 => 33,  311 => 14,  308 => 13,  305 => 30,  299 => 8,  290 => 5,  287 => 23,  284 => 22,  281 => 409,  264 => 16,  261 => 15,  258 => 354,  255 => 353,  250 => 341,  244 => 8,  238 => 312,  235 => 311,  232 => 4,  224 => 309,  222 => 297,  219 => 302,  217 => 289,  214 => 298,  209 => 290,  207 => 269,  204 => 267,  202 => 266,  199 => 265,  196 => 268,  194 => 248,  191 => 246,  186 => 239,  183 => 247,  178 => 240,  168 => 222,  166 => 209,  161 => 202,  158 => 208,  156 => 195,  153 => 201,  151 => 188,  148 => 194,  143 => 187,  141 => 175,  136 => 168,  133 => 174,  131 => 160,  128 => 167,  126 => 147,  111 => 110,  108 => 115,  103 => 108,  101 => 89,  91 => 35,  83 => 30,  76 => 31,  71 => 19,  65 => 21,  60 => 13,  63 => 14,  57 => 12,  29 => 3,  26 => 3,  20 => 1,  123 => 159,  119 => 117,  116 => 116,  88 => 65,  82 => 16,  72 => 13,  61 => 2,  51 => 8,  48 => 8,  45 => 2,  42 => 12,  30 => 5,  28 => 12,  37 => 5,  27 => 1,  23 => 1,  19 => 1,  237 => 101,  234 => 100,  231 => 99,  226 => 97,  223 => 96,  206 => 78,  197 => 249,  193 => 71,  189 => 240,  185 => 69,  181 => 232,  176 => 223,  173 => 232,  170 => 64,  118 => 146,  114 => 111,  110 => 13,  102 => 25,  98 => 101,  93 => 85,  90 => 8,  85 => 6,  80 => 5,  55 => 3,  53 => 96,  46 => 14,  41 => 6,  33 => 23,  31 => 5,  25 => 11,  106 => 104,  99 => 68,  96 => 67,  92 => 20,  86 => 46,  73 => 38,  67 => 28,  62 => 24,  59 => 10,  54 => 9,  50 => 15,  44 => 7,  39 => 8,  36 => 5,  502 => 335,  498 => 334,  494 => 90,  489 => 331,  485 => 329,  482 => 328,  463 => 312,  454 => 306,  445 => 300,  405 => 49,  401 => 262,  394 => 258,  390 => 43,  382 => 252,  378 => 251,  371 => 35,  367 => 246,  361 => 243,  357 => 242,  349 => 237,  335 => 21,  326 => 220,  291 => 188,  275 => 17,  268 => 373,  257 => 163,  243 => 327,  229 => 3,  212 => 279,  190 => 108,  171 => 216,  163 => 215,  146 => 181,  138 => 180,  121 => 131,  113 => 130,  81 => 40,  78 => 44,  75 => 28,  69 => 13,  64 => 3,  58 => 10,  52 => 2,  49 => 7,  43 => 4,  38 => 6,  35 => 29,  32 => 6,);
    }
}
