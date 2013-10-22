<html>
<head>
<title>Hugh Ybarra HTML Email</title>
</head>
<body>
<?php
	$to = 'wbunner@fullsail.edu';
	$subject = "Email attachment assignment";
	$message = "if you can read this my homework works ^_^";
	// open file
	$file = fopen("myTank.jpg", "r");
	if($file == false){
		echo "Error  in opening file";
		exit();
	}
	// Read  the file into  a variable
	$size = filesize("myTank.jpg");
	$content = fread($file, $size);
	
	// encode data for transit 
	$encode_content = chunk_split(base64_encode($content));
	
	// get random 32 bit char 
	$num = md5( time() );
	
	// define the main headers
	$header = "From:test.ybarra@gmail.com \r\n";
	$header .= "MIME-Version: 1.0 \r\n";
	$header .= "Content-Type: multipart/mixed;";
	$header .= "boundary=$num \r\n";
	$header .= "--$num \r\n";
	// define the message section
	# Define the message section
    $header .= "Content-Type: text/plain\r\n";
    $header .= "Content-Transfer-Encoding:8bit\r\n\n";
    $header .= "$message\r\n";
    $header .= "--$num\r\n";
	
	// define  the attachment section
	$header .= "Content-Type: multipart/mixed;";
	$header .= "name=\"test.text\"\r\n";
    $header .= "Content-Transfer-Encoding:base64\r\n";
    $header .= "Content-Disposition:attachment; ";
    $header .= "filename=\"test.jpg\"\r\n\n";
    $header .= "$encode_content\r\n";
    $header .= "--$num--";
	
	// send email now 
	$retval = mail($to, $subject, "", $header);
	
	if ($retval == true){
		echo "message  Sent successfully";
	}else{
		echo "message could not be sent";
	}
?>
</body>
</html>