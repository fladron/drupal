<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>TITLE</title>
  <style type="text/css">
    /* Based on The MailChimp Reset INLINE: Yes. */
    /* Client-specific Styles */
    #outlook a {padding:0;} /* Force Outlook to provide a "view in browser" menu link. */
    body{width:100% !important; -webkit-text-size-adjust:100%; -ms-text-size-adjust:100%; margin:0; padding:0;} 
    /* Prevent Webkit and Windows Mobile platforms from changing default font sizes.*/ 
    .ExternalClass {width:100%;} /* Force Hotmail to display emails at full width */  
    .ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div {line-height: 100%;}
    /* Forces Hotmail to display normal line spacing.  More on that: http://www.emailonacid.com/forum/viewthread/43/ */ 
    #backgroundTable {margin:0; padding:0; width:100% !important; line-height: 100% !important;}
    /* End reset */

    /* Some sensible defaults for images
    Bring inline: Yes. */
    img {outline:none; text-decoration:none; -ms-interpolation-mode: bicubic;} 
    a img {border:none;} 
    .image_fix {display:block;}

    /* Yahoo paragraph fix
    Bring inline: Yes. */
    p {margin: 1em 0;}

    /* Hotmail header color reset
    Bring inline: Yes. */
    h1, h2, h3, h4, h5, h6 {color: #51565e !important;}

    h1 a, h2 a, h3 a, h4 a, h5 a, h6 a {color: #056050 !important;}

    h1 a:active, h2 a:active,  h3 a:active, h4 a:active, h5 a:active, h6 a:active {
    color: red !important; /* Preferably not the same color as the normal header link color.  There is limited support for psuedo classes in email clients, this was added just for good measure. */
    }

    h1 a:visited, h2 a:visited,  h3 a:visited, h4 a:visited, h5 a:visited, h6 a:visited {
    color: purple !important; /* Preferably not the same color as the normal header link color. There is limited support for psuedo classes in email clients, this was added just for good measure. */
    }

    /* Outlook 07, 10 Padding issue fix
    Bring inline: No.*/
    table td {border-collapse: collapse;}

    /* Remove spacing around Outlook 07, 10 tables
    Bring inline: Yes */
    table { border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt; }

    /* Styling your links has become much simpler with the new Yahoo.  In fact, it falls in line with the main credo of styling in email and make sure to bring your styles inline.  Your link colors will be uniform across clients when brought inline.
    Bring inline: Yes. */
    a {color: #4d4d4d;}

    /*********************
    * Typography
    **********************/
    body {
      font-family: Helvetica, Arial, sans-serif;
      color: #51565e;
    }

  </style>

  <!-- Targeting Windows Mobile -->
  <!--[if IEMobile 7]>
  <style type="text/css">
  
  </style>
  <![endif]-->

  <!--[if gte mso 9]>
    <style>
    /* Target Outlook 2007 and 2010 */

    </style>
  <![endif]-->
</head>
<body>
<?php
// padded table inner structure
/*
<tr><td height="20"></td></tr>
<tr>
  <td width="20"></td>
  <td>
    <table cellpadding="0" cellspacing="0" border="0" width="100%">

    </table>
  </td>
  <td width="20"></td>
</tr>
<tr><td height="20"></td></tr>
*/
?>

<table cellpadding="0" cellspacing="0" border="0" id="backgroundTable" width="100%" bgcolor="#056051">
  <tr>
    <td valign="top">
      <table cellpadding="0" cellspacing="0" border="0" align="center" style="max-width:600px;" width="100%"> <!-- Start: Content table -->
        <tr> <!-- Header -->
          <td width="100%" valign="top">
            <table cellpadding="0" cellspacing="0" border="0" width="100%" bgcolor="#f2f2f0">
              <tr><td height="20"></td></tr>
              <tr>
                <td width="20"></td>
                <td><a href="<?php print $absolute_path; ?>"><img src="<?php print $absolute_path; ?>/sites/all/themes/MY_THEME/logo.png" alt="logo"></a></td>
                <td width="20"></td>
                <td valign="middle"><p style="color: #51565e; font-size: 12px;"><?php print format_date($created, 'medium'); ?></p></td>
                <td width="20"></td>
              </tr>
              <tr><td height="20"></td></tr>
            </table>
          </td>
        </tr>
        <tr> <!-- Content -->
          <td width="100%" valign="top">
            ...
          </td>
        </tr>
