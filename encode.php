<?php

function splitByNewline($string, $length) {
    while (strlen($string)>0) {
    $newstring.=substr($string, 0, $length) . "\n";
    $string=substr($string, $length);
    }
  return $newstring;
}

echo "<big><b>Free Code Obfuscator (PHP, PERL)</b>";

$b64_input=stripslashes($_POST['b64_input']);
switch($_POST['b64_action']) {
    case "perl_encode":
      $output=$b64_input;
         $output=base64_encode($output);
    $output=splitByNewline($output,40);
    $output="#!/usr/bin/perl\nuse MIME::Base64;\neval(decode_base64('\n$output'));";
    
    $ilength=strlen($b64_input);
    $olength=strlen($output);

    ?>
    <table border=0 width=100%><tr><td valign=top>
    <textarea rows=18 cols=60 name=done><?=$output;?></textarea>
    </td><td valign=top>
    <b>PERL code obfuscated!</b><br><br>
    
    Your PERL code has been obfuscated. 
    <br><br>
    <font color=maroon>
    Obfuscation-Strength: Normal (Fast code execution)<br>
    Compatibility: 100% Code compatibility<br>
    Input Length: <?=$ilength;?><br>
    Output Length: <b><?=$olength;?></b><br>
    </font>
    <br>
    To use the code, simply cut and paste it in place of the old code. You may need to update the perl path.
    It is important to understand that code obfuscation can act as a deterrant, but is not a replacement
    for encryption.<br><br>
    
    <a href='?'>Click here</a> to obfuscate another page.
    </td></tr></table>
    <?
  break;
    case "php_encode":
      $output=$b64_input;
      $output=gzdeflate($output,9);
      $output=base64_encode($output);
    $output=splitByNewline($output,40);
    $output="<? eval(gzinflate(base64_decode('\n$output'))); ?>";
    
    $ilength=strlen($b64_input);
    $olength=strlen($output);

    ?>
    <table border=0 width=100%><tr><td valign=top>
    <textarea rows=18 cols=60 name=done><?=$output;?></textarea>
    </td><td valign=top>
    <b>PHP code obfuscated!</b><br><br>
    
    Your PHP code has been obfuscated. 
    <br><br>
    <font color=maroon>
    Obfuscation-Strength: Normal (Fast code execution)<br>
    Compatibility: Zlib Required. 100% Code compatibility<br>
    Input Length: <?=$ilength;?><br>
    Output Length: <b><?=$olength;?></b><br>
    </font>
    <br>
    To use the code, simply cut and paste it in place of the old code.
    It is important to understand that code obfuscation can act as a deterrant, but is not a replacement
    for encryption.<br><br>
    
    <a href='?'>Click here</a> to obfuscate another page.
    </td></tr></table>
    <?
  break;
    case "php_encode_hi":
      $output=$b64_input;
    for ($b64_counter=0; $b64_counter<10; $b64_counter++) {
          $output=gzdeflate("?>".$output."<?",9);
          $output=base64_encode($output);
      $output="<? eval(gzinflate(base64_decode('$output'))); ?>";
    }
        $output=gzdeflate("?>".$output."<?",9);
        $output=base64_encode($output);
    $output="<? eval(gzinflate(base64_decode('\n$output'))); ?>";
    
    $ilength=strlen($b64_input);
    $olength=strlen($output);
    
    ?>

    <table border=0 width=100%><tr><td valign=top>
    <textarea rows=18 cols=60 name=done><?=$output;?></textarea>
    </td><td valign=top>
    <b>PHP code obfuscated!</b><br><br>
    
    Your PHP code has been obfuscated. 
    <br><br>
    <font color=maroon>
    Obfuscation-Strength: Trecherous (Best Protection)<br>
    Compatibility: Zlib Required. 100% Code Compatibility.<br>
    Input Length: <?=$ilength;?><br>
    Output Length: <b><?=$olength;?></b><br>
    </font>
    <br>
    To use the code, simply cut and paste it in place of the old code.
    It is important to understand that code obfuscation can act as a deterrant, but is not a replacement
    for encryption.<br><br>
    
    <a href='?'>Click here</a> to obfuscate another page.
    </td></tr></table>
    <?
  break;
  // case "decode":
  //     $output=htmlentities(base64_decode($b64_input),ENT_QUOTES);
  // break;
  default:
    ?>
    <table border=0 width=100%><tr><td valign=top>
    <form method=post>
    <textarea  name=b64_input cols=60 rows=16></textarea><br>
    <SELECT name=b64_action>
    <OPTION value='php_encode'>PHP - Normal Strength - Compressed</OPTION>
    <OPTION value='php_encode_hi'>PHP - Trecherous Strength - Compressed</OPTION>
    <OPTION value='perl_encode'>PERL - Normal Strength</OPTION>
    </SELECT>
    <input type=submit name=submit value='obfuscate'>
    <!-- <input type=submit name=b64_action value=decode> -->
    </form>
    </td><td valign=top>
    <b>Free Code obfuscator</b><br><br>
    
    If you would like a quick way to hide your php code from prying eyes, try this PHP code obfuscator.<br><br>Copy an entire PHP page, into the obfuscator, and it will return a code that also works on any PHP server, but is not human readable.<br><br>

        With code 5k or bigger, you may notice that the obfuscated code is smaller than the original code. You can thank me later. <br><br> It is best to chose the Trecherous Strength - Compressed option for php as the normal stength can be easily worked around.
    </td></tr></table>
    <?  
  break;
}
 


// $content will now contain your evaluated code :)

?>
