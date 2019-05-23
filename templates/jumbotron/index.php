<?php 
  $app  = JFactory::getApplication();
  $params = $app->getTemplate(true)->params;
  $sitename = htmlspecialchars($app->get('sitename'), ENT_QUOTES, 'UTF-8');

  $document = JFactory::getDocument();
  $document->addStyleSheet($this->baseurl."/templates/".$this->template."/css/bootstrap-nav.css");
  $document->addScript($this->baseurl."/templates/".$this->template."/js/bootstrap-nav.js");
  $document->addScript($this->baseurl."/templates/".$this->template."/js/aos.js");
  $document->addScript($this->baseurl."/templates/".$this->template."/js/page_scroll_main.js");
  /*$document->addScript($this->baseurl."/templates/".$this->template."/js/page_scroll_modernizr.js");
  $document->addScript($this->baseurl."/templates/".$this->template."/js/page_scroll_velocity.min.js");
  $document->addScript($this->baseurl."/templates/".$this->template."/js/page_scroll_velocity.ui.min.js");
  $document->addScript($this->baseurl."/templates/".$this->template."/js/page_scroll_main.js");*/

  $document->addStyleSheet($this->baseurl."/templates/".$this->template."/css/bootstrap.min.css");
  $document->addScript($this->baseurl."/templates/".$this->template."/js/jquery.min.js");
  $document->addScript($this->baseurl."/templates/".$this->template."/js/popper.min.js");
  $document->addScript($this->baseurl."/templates/".$this->template."/js/bootstrap.min.js");
  $document->addScript("https://unpkg.com/bootstrap-material-design@4.1.1/dist/js/bootstrap-material-design.js");
  $document->addScript($this->baseurl."/templates/".$this->template."/js/fab.js");
  $document->addScript($this->baseurl."/templates/".$this->template."/js/bootstrap-select.js");
  $document->addScript($this->baseurl."/templates/".$this->template."/js/enquiry-form.js");

  /*$document->addStyleSheet('/joomla-4/templates/jumbotron/css/style.css');*/
  $document->addStyleSheet($this->baseurl."/templates/".$this->template."/css/Footer-with-button-logo.css"); 
  $document->addStyleSheet($this->baseurl."/templates/".$this->template."/css/font-awesome.min.css");
  //$document->addStyleSheet('http://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css');
  // $document->addStyleSheet('/joomla-4/templates/jumbotron/css/bootstrap.min.css');
  $document->addStylesheet($this->baseurl."/templates/".$this->template."/css/aos.css");
  $document->addStylesheet($this->baseurl."/templates/".$this->template."/css/page_scroll_reset.css");
  $document->addStylesheet($this->baseurl."/templates/".$this->template."/css/page_scroll_style.css");
  $document->addStylesheet($this->baseurl."/fonts/css/Open+Sans.css");
  $document->addStylesheet($this->baseurl."/templates/".$this->template."/css/fab.css");
  $document->addStylesheet($this->baseurl."/templates/".$this->template."/css/radio-button.css");
  $document->addStylesheet($this->baseurl."/templates/".$this->template."/css/pricing.css");
  $document->addStylesheet($this->baseurl."/templates/".$this->template."/css/bootstrap-select.css");

  //$document->addStylesheet("https://unpkg.com/bootstrap-material-design@4.1.1/dist/css/bootstrap-material-design.min.css");

  // if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $app = JFactory::getApplication();
    $data = array();
    $data = $app->input->post->getArray($_POST);

    if(isset($data['mobile'])) {
        $name_patt = "/^[a-zA-Z]{3,30}(\s[a-zA-Z]{1,30}){0,2}$/"; 
        $mbno_patt = "/^[0-9]{10}$/";
        $email_patt = "/^[a-zA-Z0-9]{3,20}(.[a-zA-Z]{1,10})?@([a-zA-Z]{2,6})(\.[a-zA-Z]{2,6}){1,2}$/";

        $dbo = JFactory::getDbo();

        $name = mysqli_real_escape_string($dbo->getConnection(), $data['name']);
        $email = mysqli_real_escape_string($dbo->getConnection(), $data['email']);
        $mbno = mysqli_real_escape_string($dbo->getConnection(), $data['mobile']);
        if(preg_match($name_patt, $name)) {
          if(preg_match($email_patt, $email)) {
            if(preg_match($mbno_patt, $mbno)) {
              $row = new stdClass();
              $row->name = $name;
              $row->email = $email;
              $row->phone = $mbno;

              $response = new stdClass();
              try {
                $dbo->insertObject('#__short_inquiries', $row);
                $response->status = 200;
                $response->message = 'success';
              }catch(Exception $exce) {
                $response->status = 500;
                $response->message = 'failure';
              }
              echo json_encode($response);
            }
          }
        }
      //}
    }else {

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <jdoc:include type="head" />
    <link href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/css/jumbotron.css" rel="stylesheet">
  </head>

  <body>

    <jdoc:include type="modules" name="menu" style="none" />

    <?php if($this->countModules('showcase')) : ?>
      <jdoc:include type="modules" name="showcase" style="none" />
    <?php endif; ?>

      <!--<div class="container">
          <?php if($this->countModules('box1')) : ?>
            <jdoc:include type="modules" name="box1" style="xhtml" />
          <?php endif; ?>
          <?php if($this->countModules('box2')) : ?>
            <jdoc:include type="modules" name="box2" style="xhtml" />
          <?php endif; ?>
          <?php if($this->countModules('box3')) : ?>
            <jdoc:include type="modules" name="box3" style="xhtml" />
          <?php endif; ?>
      </div>

      <hr>-->

    </div>
    
    <!-- <a href="javascript:" id="return-to-top"><i class="fa fa-2x fa-chevron-up" aria-hidden="true"></i></a>-->
    <jdoc:include type="modules" name="footer" style="none" />

    <div class="bak"></div>
    <div class="floatingButtonWrap">
      <div class="floatingButtonInner">
          <a href="#" class="floatingButton">
              <i class="fa fa-lg fa-comments icon-default"></i>
          </a>
          <!-- <ul class="floatingMenu">

          </ul> -->
          <div class="modal fade fab-wait" tabindex="-1">
              <div class="modal-dialog modal-sm">
                  <div class="modal-content text-center">
                      <label style="font-size: 2em;color: white;">Please wait...</label>
                      <span class="fa fa-spinner fa-spin fa-3x"></span>
                  </div>
              </div>
          </div>

          <div class="enquiry-form floatingMenu">
            <!-- <div class="row h-100"> -->
              <div class="col-sm-12 png-holder">
                <div id="close-btn-div">
                  <span id="close-btn" class="fa fa-close fa-lg"></span>
                </div>
                <div class="background-card card-block w-100 h-100"></div>
              </div>
              
              <div class="text-left fab-header mt-auto mb-auto">
                <h4>Hey there</h4>
                <h6>Our support team is here to help you. Over the last 100 customers we helped, 96% said our service was awesome!</h6>
              </div>

              <div class="col-sm-12 mt-auto mb-3 short-enq-form">
                <div class="card enquiry-form-card card-block row w-100 h-100">

                  <div class="d-flex h-100">
                    <div class="row justify-content-center align-self-center">

                      <div class="form-label-group fab-form-label-group">
                        <input type="text" id="name" name="name" class="form-control shadow-none" placeholder="Name">
                        <label for="name">Name</label>
                      </div>
                      <div class="form-label-group fab-form-label-group">
                        <input type="email" id="email" name="email" class="form-control shadow-none" placeholder="Email">
                        <label for="email">Email</label>
                      </div>
                      <div class="form-label-group fab-form-label-group">
                        <input type="text" id="contact" name="contact" class="form-control shadow-none" placeholder="Mobile Number">
                        <label for="contact">Mobile Number</label>
                      </div>
                      <div class="input-group-icon input-group mt-2">
                        <span href="http://localhost/joomla-4/enquiry" id="short-enquiry-submit">Contact us</span>
                      </div>

                    </div>
                  </div>

                </div>
              </div>
          </div>

      </div>
    </div>
<!-- 
  <div class="modal fade wait" tabindex="-1">
    <div class="modal-dialog modal-sm">
        <div class="modal-content" style="width: 48px">
            <span class="fa fa-spinner fa-spin fa-3x"></span>
        </div>
    </div>
  </div> -->

    <!-- <script src="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/js/jquery.min.js"></script> -->
    <!-- <script src="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/js/bootstrap.min.js"></script> -->
  </body>
</html>
<?php } ?>