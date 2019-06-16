<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Tupper Code Framework</title>

	<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body {
		margin: 0 15px 0 15px;
	}

	p.footer {
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}

	#container {
		margin: 10px;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
	}
	</style>
</head>
<body>

<div id="container">
	<h1><b>Tupper Code Framework</b></h1>

	<div id="body">
		<p>Tupper Code Framework adalah framework hasil modifikasi CodeIgniter. Tupper Code Framework dibuat oleh <b>Mohamad Ibnu Rizky</b></p>

		<p>Format dari codeigniter tidak akan hilang, bisa dilihat di <a href="user_guide/">User Guide</a>.</p>
	</div>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong> <br/>Tupper Code Framework <b>v0.1</b>' : '' ?></p>
</div>

<div id="container">
	<h1><b>Fungsi Load</b></h1>

	<div id="body">
		<table width="100%" border="1">
			<tr>
				<td colspan="2"><b>Load View</b></td>
			</tr>
			<tr>
				<td><b>Tupper Code Framework</b></td>
				<td><b>CodeIgniter Framework</b></td>
			</tr>
			<tr>
				<td width="50%">
					<code>
						//view basic<br/>
						loadView("your view");
						<br/><br/>
						//view with data<br/>
						$this->data['user'];<br/>
						loadView("your view");
						<br/><br/>
						//view with return true<br/>
						loadView("your view",TRUE);
					</code>
				</td>
				<td width="50%">
					<code>
						//view basic<br/>
						$this->load->view("your view");
						<br/><br/>
						//view with data<br/>
						$data['user'];<br/>
						$this->load->view("your view",$data);
						<br/><br/>
						//view with return true<br/>
						$this->load->view("your view",'',TRUE);
					</code>
				</td>
			</tr>
		</table>
		<br/><br/>
		<table width="100%" border="1">
			<tr>
				<td colspan="2"><b>Load Model</b></td>
			</tr>
			<tr>
				<td><b>Tupper Code Framework</b></td>
				<td><b>CodeIgniter Framework</b></td>
			</tr>
			<tr>
				<td width="50%">
					<code>
						//load model basic<br/>
						loadModel("your model");
						<br/><br/>
						//load model with rename<br/>
						loadModel("your model","new name");
					</code>
				</td>
				<td width="50%">
					<code>
						//view basic<br/>
						$this->load->model("your model");
						<br/><br/>
						//load model with rename<br/>
						$this->load->model("your model","new name");
					</code>
				</td>
			</tr>
		</table>
		<br/><br/>
		<table width="100%" border="1">
			<tr>
				<td colspan="2"><b>Load Model</b></td>
			</tr>
			<tr>
				<td><b>Tupper Code Framework</b></td>
				<td><b>CodeIgniter Framework</b></td>
			</tr>
			<tr>
				<td width="50%">
					<code>
						//load model basic<br/>
						loadModel("your model");
						<br/><br/>
						//load model with rename<br/>
						loadModel("your model","new name");
					</code>
				</td>
				<td width="50%">
					<code>
						//view basic<br/>
						$this->load->model("your model");
						<br/><br/>
						//load model with rename<br/>
						$this->load->model("your model","new name");
					</code>
				</td>
			</tr>
		</table>
	</div>

	<p class="footer"></p>
</div>

</body>
</html>