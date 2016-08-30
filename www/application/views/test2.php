<html>
<head>
    <title>js测试</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="jquery.autocomplete.css" rel="stylesheet" type="text/css" />
    <script src="<?php echo base_url().'js/jquery.js' ?>" type="text/javascript"></script>  
    <script language="javascript" type="text/javascript">
    function test(){
    var number=$("#txtUserId").val();
    //This is ok
    //alert($("#txtUserId").val());
    //This is not ok(undefine)
    //alert($("#txtUserId").value);
    //This is ok
    //document.subform.testName.value=number;
    //This is ok
   document.subform.testId.value=number;
    //This is not ok(It doesn't work)
    //$("#testId").value=number;
    }
    </script>
</head>
<body> 
    <div>
<form name="subform">
    <ul>
        <li>
            <input id="txtUserId" type="text" value="huang" />
        </li>
    </ul>

 <input id="testId" name=testName type="text" value="good"/>
 <input type="button" value="submit" onclick="test()">
</form>
    </div>
</body>
</html>