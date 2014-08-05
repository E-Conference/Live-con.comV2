
<html lang="en">
<head>
  <meta charset="UTF-8"/>
      <title>Livecon upgrade your conference</title>

      <script type="text/javascript" src="../web/js/jquery.js"></script>
        <script type="text/javascript">


$(function(){

  var test,
    url,
    entities  ={orga:[]},
    oldCookie = document.cookie,
    $body=$("body"),
    existingOrgaId = 1,
    originalLabel = "test_orga",
    updatedLabel = "test_orga-updated",
    originalTestRest = "test_rest",
    updatedTestRest = "test_rest-updated"
    ;

	$.ajaxSetup({  
		async:false,
		complete:function(a) {
			if(a.status>=300)
				$body.append("<span style='color:red;'> "+a.statusText+"</span>");
			else if(a.responseText && a.responseText.indexOf('_username') > 0)
				$body.append("<span style='color:red;'> login default page</span>");
			else
				$body.append("<span style='color:green;'> "+a.statusText+"</span>");
			$body.append($("<pre>").text(a.responseJSON ? JSON.stringify(a.responseJSON) : JSON.stringify(a) ));
		}
	});


  /***********************************************************************************************/
  /******************************************* test login *****************************************/
  /***********************************************************************************************/
	test = "test Login";
	url =  'app_dev.php/login/login_check';
	$body.append("<br/><span style='font-size:20px;font-weight: bold'>"+test+" : "+url+"</h3>");
	$('<form id="login-form" action="'+url+'" method="post">\
      <input name="_username" value="admin"/>\
      <input name="_password" value="admin"/>\
      <input type="checkbox" id="remember_me" name="_remember_me" checked="checked"/>\
    </form> ')
		.appendTo('body')
		.submit(function()
		{
	    var postData = $(this).serializeArray();
	    var formURL = $(this).attr("action");


      $.ajax(
	    {
			    contentType: "application/x-www-form-urlencoded", 
	        url : formURL,
	        type: "POST",
	        data : postData
	    });
      $(this).remove();
	    return false
		})
    .submit();

  assertTrue('cookie not changed !', oldCookie != document.cookie);

	$.ajaxSetup({ contentType: "application/json"});

  /***********************************************************************************************/
  /******************************************* test simple request *****************************************/
  /***********************************************************************************************/
  test = "test simple request";
  url  = 'app_dev.php/api/companies';
	$body.append("<br/><span style='font-size:20px;font-weight: bold'>"+test+" : "+url+"</h3>");


  $.ajax({
	    url: url
	});

  /***********************************************************************************************/
  /******************************************* test POST *****************************************/
  /***********************************************************************************************/
	test = "test POST";
  url =   'app_dev.php/api/companies';


	$body.append("<br/><span style='font-size:20px;font-weight: bold'>"+test+" : "+url+"</h3>");

  $.ajax({
	    type: "POST",
	    url: url,
	    data: '{"label": "'+originalLabel+'", "testRest": "'+originalTestRest+'"}',
    success:function(a,b){
        entities['orga'].push(a);
      }
	});
  /***********************************************************************************************/
  /******************************************* test PUT *****************************************/
  /***********************************************************************************************/
  test = "test PUT";


  url =   'app_dev.php/api/companies/'+entities['orga'][0].id+'';
  $.ajax({
    url: url
  });
  url =   'app_dev.php/api/companies/'+entities['orga'][0].id+'';


  $body.append("<br/><span style='font-size:20px;font-weight: bold'>"+test+" : "+url+"</h3>");
  $.ajax({
    type: "PUT",
    url: url,
    data: '{"id": "'+entities['orga'][0].id+'","label": "'+updatedLabel+'"}',
      success:function(a,b){
        entities['orga'][0] = a;
      }
  });


  url =   'app_dev.php/api/companies/'+entities['orga'][0].id+'';


  $.ajax({
    url: url,
    success:function(a){
      assertTrue('Label should be '+ updatedLabel, a.label == updatedLabel);
      assertTrue('testRest should be empty, instead, it\'s' + a.test_rest + ' !', !a.test_rest);
    }
  });


  /***********************************************************************************************/
  /******************************************* test PATCH *****************************************/
  /***********************************************************************************************/
  test = "test PATCH";
  url =   'app_dev.php/api/companies/'+entities['orga'][0].id+'';

  $body.append("<br/><span style='font-size:20px;font-weight: bold'>"+test+" : "+url+"</h3>");


  $.ajax({
    type: "PATCH",
    url: url,
    data: '{"id": "'+entities['orga'][0].id+'","testRest": "'+updatedTestRest+'"}',
      success:function(a,b){
        entities['orga'][0] = a;
      }
  });


  $.ajax({
    url: url,
    success:function(a){
      assertTrue('testRest should be '+updatedTestRest, a.test_rest == updatedTestRest);
      assertTrue('label should be '+updatedLabel, a.label == updatedLabel);
    }
  });


  /***********************************************************************************************/
  /******************************************* test pagination *****************************************/
  /***********************************************************************************************/
  test = "test pagination";
  url  = 'app_dev.php/api/companies';
  $body.append("<br/><span style='font-size:20px;font-weight: bold'>"+test+" : "+url+"</h3>");


  $.ajax({
    url: url
  });
  //TODO test remove
  //TODO test order
  //TODO test order



  function assertTrue(errorMsg,test)
  {
    if (!test)
      $body.append(" <span style='color:red;'> "+errorMsg+"</span>")
  }

});

        </script>
</head>
<body>
</body>