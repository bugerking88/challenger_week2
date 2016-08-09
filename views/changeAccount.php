<html>
	<?php ?>
	<head>
		<meta charset="utf-8">
		<link href="/book_active/css/form.css" rel="stylesheet">
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		
		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
		
		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	</head>
	<body>
        <div class="row centered-form">
        <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
        	<div class="panel panel-default">
        		<div class="panel-heading">
			    		<h3 class="panel-title">使用者切換</h3>
			 			</div>
			 			<div class="panel-body">
			    		<form name="form" method="post" action="/bank_account/bank/bankPage">
			    			<div class="row">
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
				                		<lable>使用者</lable>
				                			<select name="part_count" id="part_count">
            								　<option value="Taipei">台北</option>
            								　<option value="Taoyuan">桃園</option>
            								　<option value="Hsinchu">新竹</option>
            								　<option value="Miaoli">苗栗</option>
            								</select>
			    					</div>
			    				</div>
			    			</div>
			    			<input type="submit" value="確定" class="btn btn-info btn-block" id="transform">
			    		</form>
			    	</div>
	    		</div>
    		</div>
    	</div>
    </body>
</html>