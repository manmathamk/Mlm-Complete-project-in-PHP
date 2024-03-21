<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
    //this calculates values automatically 
    sum();
    $("#num1, #num2").on("keydown keyup", function() {
        sum();
    });
});

function sum() {
            var num1 = document.getElementById('num1').value;
            var num2 = document.getElementById('num2').value;
			var result = parseInt(num1) + parseInt(num2);
			var result1 = parseInt(num2) - parseInt(num1);
            if (!isNaN(result)) {
                document.getElementById('sum').value = result;
				document.getElementById('subt').value = result1;
            }
        }
</script>
<form name="form1" method="post" action="" >
<table>
<tr><td>Num 1:</td><td><input type="text" name="num1" id="num1" /></td></tr>
<tr><td>Num 2:</td><td><input type="text" name="num2" id="num2" /></td></tr>
<tr><td>Sum:</td><td><input type="text" name="sum" id="sum" readonly /></td></tr>
<tr><td>Subtract:</td><td><input type="text" name="subt" id="subt" readonly /></td></tr>
</table>
</form>