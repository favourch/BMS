<?php
/**

 *
 *
 * @category   proporta
 * @package    Mail_service
 *

 * Example:
 * $mail =new Base_Model_Lib_Mail_Service_Mailer();
 * $emailBody = "This is a test mail sent by [user]";
 * $tag =array ('[user]'=>'google');
 * $mail->setTag($tag);
 * $mail->setText($emailBody);
 * $mail->setFrom('admin@google.com', 'Google Admin');
 * $mail->addTo("iamantha@gmail.com",'samantha');
 * $mail->setSubject('Test mail');
 * $mail->setMailType('text');
 * $mail->send();
 *
 */
Class Base_Model_Lib_Mail_Service_Mailer extends Zend_Mail
{

	private $tag			=	array(); // Tag array for tag replacement
	private $template 		= null ;   	// Mail template object
	private $mailType	= 'html';

	//for text message handling
	private $bodyText 		=null;
	private $textCharset	=null;
	private $textEncoding	=null;

	//for html message handling
	private $bodyHtml 		=null;
	private $htmlCharset	=null;
	private $htmlEncoding	=null;
	private $attachment     = null;

	public function __construct($charset = 'iso-8859-1')
	{
		
		 $transport = new Zend_Mail_Transport_Sendmail();
		Zend_Mail::setDefaultTransport($transport);
		parent::__construct($charset);
	}

	/**
	 * Set the body for html mail
	 *
	 */
	public function setText($text, $charset = null, $encoding = Zend_Mime::ENCODING_QUOTEDPRINTABLE)
	{
		$this->bodyText = $text;
		$this->textCharset=$charset;
		$this->textEncoding=$encoding;
	}

	/**
	 * Set the body for html mail
	 *
	 */
	public function setHtml($text,$charset = null, $encoding = Zend_Mime::ENCODING_QUOTEDPRINTABLE)
	{
		$this->bodyHtml = $text;
		$this->htmlCharset=$charset;
		$this->htmlEncoding=$encoding;
	}

	/**
	 * Set the template for mail
	 *
	 */
	public function setTemplate($template)
	{
		$this->template = $template;
	}

	/**
	 * Set the template for mail
	 *
	 */
	public function setMailType($type)
	{
		$this->mailType = strtolower(trim($type));
	}
	/**
	 * Replace tages of the mail text.
	 * There are two types of mail contents for text and html
	 *
	 */
	private function tagReplace()
	{
		$this->bodyText=(null!=$this->bodyText)? strtr($this->bodyText,$this->tag):$this->bodyText ;
		$this->bodyHtml=(null!=$this->bodyHtml)? strtr($this->bodyHtml,$this->tag):$this->bodyHtml ;
		//parent::setSubject(strtr(parent::getSubject(),$this->tag));
	}


	/**
	 * get the tag array for used for replace the mail body.
	 * @param $tag Tag array
	 *
	 */
	public function setTag($tag)
	{
		$this->tag=is_array($tag)?array_merge($this->tag,$tag):$this->tag;
	}

	/**
	 * Read the content from mail template and set contents
	 *
	 */
	private function createTempatedMail()
	{
		
		$this->bodyText=$this->template->mailBody;
		$this->bodyHtml=$this->template->mailHtmlBody;
		
		parent::clearFrom();
		parent::setFrom($this->template->mailFrom, $this->template->mailFromName);
		
		parent::clearSubject();
		parent::setSubject($this->template->mailSubject);

	}
	
	
	// set the attachment.....
	public function setAttachment($attachment){
		$this->attachment = $attachment;
	}
	
	

	/**
	 * Create the mail by replacing tags and embedding image and handover to parent to send the message
	 *
	 */
	public function send($transport = null)
	{
		return true;
		if(null!=$this->template)
		{
			// this will override the existing text and html body
			$this->createTempatedMail();
		}

		//replace tags if required
		if(count($this->tag)>0)
		{
			$this->tagReplace();
		}
		
		if($this->attachment){
			$at = new Zend_Mime_Part($this->attachment);
			$at->type        = 'application/pdf';
			$at->disposition = Zend_Mime::DISPOSITION_INLINE;
			$at->encoding    = Zend_Mime::ENCODING_BASE64;
			$at->filename    = 'invoice.pdf';
			parent::addAttachment($at);
			
			//$at = parent::addAttachment($this->attachment, 'application/pdf',Zend_Mime::DISPOSITION_INLINE , Zend_Mime::ENCODING_BASE64);
		}

		if('html'==$this->mailType)
		{	//Processing html mails
 
			if(null!=$this->bodyHtml)
			{
				parent::setBodyHtml($this->bodyHtml,$this->htmlCharset, $this->htmlEncoding);
			}
			else
			{
				throw new Base_Model_Lib_Mail_Exception('Html mail body is empty ');
			}
		}
		else
		{	//Processing text mails
			if(null!=$this->bodyText)
			{
				parent::setBodyText($this->bodyText,$this->textCharset, $this->textEncoding);
			}
			else
			{
				throw new Base_Model_Lib_Mail_Exception('Text mail body is empty ');
			}
		}

		try{
			return parent::send($transport);
		}
		catch (Zend_Mail_Exception $e)
		{
			throw new Base_Model_Lib_Mail_Exception('Mail send fails : '.$e->getMessage());
		}
	}

}
