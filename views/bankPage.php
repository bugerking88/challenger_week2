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
 <ul>
  <li><a class="active" href="/bank_account/bank/bank_page">餘額和帳目明細</a></li>
  <li><a class="bg-danger" href="/bank_account/bank/changeAccount">更換使用者</a></li>
</ul>
        <div class="row centered-form">
        <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
        	<div class="panel panel-default">
        		<div class="panel-heading">
			    		<h3 class="panel-title">餘額和帳目明細</h3>
			 			</div>
			 			<div class="panel-body">
			    		<form name="form" method="post" action="/bank_account/bank/moneyInOut">
			    			<div class="row">
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
				                		<lable>使用者A</lable>
			    					</div>
			    				</div>
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<lable>餘額</lable><lable>100000</lable>
			    					</div>
			    				</div>
			    			</div>
			    			<input type="submit" value="轉帳" class="btn btn-info btn-block" id="transform">
			    		</form>
			    	</div>
	    		</div>
    		</div>
			    	<div class="container">
						<table class="table">
					      <tr>
					        <th>轉出</th>
					        <th>轉入</th>
					        <th>金額</th>
					      </tr>
					      	<?php for($i=0;$i<count($data);$i++){ ?>
					      <tr>
					        <th><?php echo $data[$i]['act_name']?></th>
					        <th><?php echo $data[$i]['max_person']?></th>
					        <th><?php echo $data[$i]['partner']?></th>
					      </tr>
					        <?php } ?>
					      </table>
					</div>
    	</div>
    </div>
</body>
</html>