<form method="post" action="contact.php">  
  Email: <input name="email" type="text"><br> 
  Message:<br>  
  <textarea name="message" rows="15" cols="40"></textarea><br>  
  <input name="btn_submit" type="submit">  
</form>
<?php 
if(isset($_POST['btn_submit'])){ 
    $to = "dothanhy09122020@gmail.com";  
    $subject = "Contact Us";  
    $email = $_REQUEST['email'] ;  
    $message = $_REQUEST['message'] ;  
    $headers = "From: $email";  $sent = mail($to, $subject, $message, $headers) ;     
    if($sent)  {
        print "Gửi mail thành công"; 
    } else  {
        print "Có lỗi khi gửi mail"; 
    } 
}
?>