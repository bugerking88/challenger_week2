
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
  <li><a class="active" href="/book_active/back/back_page">出入款</a></li>
  <li><a class="bg-danger" href="/book_active/font/font_page">餘額和帳目明細</a></li>
</ul>
        <div class="row centered-form">
        <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
        	<div class="panel panel-default">
        		<div class="panel-heading">
			    		<h3 class="panel-title">餘額和帳目明細</h3>
			 			</div>
			 			<div class="panel-body">
			    		<form name="form" method="post" action="/book_active/back/createActive">
			    			<div class="row">
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			                <input type="text" name="act_name" id="act_name" class="form-control input-sm" placeholder="活動名稱">
			    					</div>
			    				</div>
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<input type="text" name="max_per" id="max_per" class="form-control input-sm" placeholder="人數限制">
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