<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Pigeon</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
      integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
      crossorigin="anonymous"
    />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    
    body {
        --twitter-color: #50b7f5;
        --twitter-background: #e6ecf0;
    }
    
    .sidebarOption {
        display: flex;
        align-items: center;
        cursor: pointer;
    }
    
    .sidebarOption .material-icons,
    .fa-twitter {
        padding: 20px;
    }
    
    .sidebarOption h2 {
        font-weight: 800;
        font-size: 20px;
        margin-right: 20px;
    }
    
    .sidebarOption:hover {
        background-color: var(--twitter-background);
        border-radius: 30px;
        color: var(--twitter-color);
        transition: color 100ms ease-out;
    }
    
    .sidebarOption.active {
        color: var(--twitter-color);
    }
    
    .sidebar__tweet {
        width: 100%;
        background-color: var(--twitter-color);
        border: none;
        color: white;
        font-weight: 900;
        border-radius: 30px;
        height: 50px;
        margin-top: 20px;
    }
    
    body {
        display: flex;
        height: 100vh;
        max-width: 1300px;
        margin-left: auto;
        margin-right: auto;
        padding: 0 10px;
    }
    
    .sidebar {
        border-right: 1px solid var(--twitter-background);
        flex: 0.2;
    
        min-width: 250px;
        margin-top: 20px;
        padding-left: 20px;
        padding-right: 20px;
    }
    
    .fa-twitter {
        color: var(--twitter-color);
        font-size: 30px;
    }
    
    /* feed */
    .feed {
        flex: 0.5;
        border-right: 1px solid var(--twitter-background);
        min-width: fit-content;
        overflow-y: scroll;
    }
    
    .feed__header {
        position: sticky;
        top: 0;
        background-color: white;
        z-index: 100;
        border: 1px solid var(--twitter-background);
        padding: 15px 20px;
    }
    
    .feed__header h2 {
        font-size: 20px;
        font-weight: 800;
    }
    
    .feed::-webkit-scrollbar {
        display: none;
    }
    
    .feed {
        -ms-overflow-style: none;
        scrollbar-width: none;
    }
    
    /* tweet box */
    .tweetbox__input img {
        border-radius: 50%;
        height: 70px;
        width: 70px;
        border: 5px solid var(--twitter-background);
    }
    
    .tweetBox {
        padding-bottom: 10px;
        border-bottom: 8px solid var(--twitter-background);
        padding-right: 10px;
    }
    
    .tweetBox form {
        display: flex;
        flex-direction: column;
    }
    
    .tweetbox__input {
        display: flex;
        padding: 20px;
    }
    
    .tweetbox__input textarea {
        flex: 1;
        margin-left: 20px;
        font-size: 20px;
        border: none;
        outline: none;
        resize: none;
    }
    
    .tweetBox__tweetButton {
        background-color: var(--twitter-color);
        border: none;
        color: white;
        font-weight: 900;
    
        border-radius: 30px;
        width: 80px;
        height: 40px;
        margin-top: 20px;
        margin-left: auto;
    }
    
    /* post */
    .post__avatar img {
        border-radius: 50%;
        height: 70px;
        width: 70px;
        border: 5px solid var(--twitter-background);
    }
    
    .post {
        display: flex;
        align-items: flex-start;
        border-bottom: 1px solid var(--twitter-background);
        padding-bottom: 10px;
    }
    
    .post__body img {
        width: 450px;
        object-fit: contain;
        border-radius: 20px;
    }
    
    .post__footer {
        display: flex;
        justify-content: space-between;
        margin-top: 10px;
    }
    
    .post__badge {
        font-size: 14px !important;
        color: var(--twitter-color);
        margin-right: 5px;
    }
    
    .post__headerSpecial {
        font-weight: 600;
        font-size: 12px;
        color: gray;
    }
    
    .post__headerText {
        
        font-size: 15px;
        margin-bottom: 5px;
        display: flex;
        flex-direction: row;
        justify-content: space-between;
    }

    .post__tag {
       
       font-size: 15px;
       margin-bottom: 5px;
       display: flex;
       flex-direction: row;
    }

    .post__time {

        font-size: 15px;
        margin-bottom: 5px;
        display: flex;
        flex-direction: row;

        width: 130px;
        height: 30px;
        padding-top: 3px;
        border-radius: 10px; 
        background: gray;
        text-align: center;
        background-color: var(--twitter-background);
        margin-right: 10px;
    }

    .post__headerText__showbox{
        width: 70px;
        height: 30px;
        padding-top: 3px;
        border-radius: 10px; 
        background: gray;
        text-align: center;
        background-color: var(--twitter-background);
        margin-right: 10px;
    }

    #timebox{
        margin-left: 15px;
    }
    
    .post__headerDescription {
        margin-bottom: 10px;
        font-size: 15px;
        word-wrap: break-word;
    }
    
    .post__body {
        flex: 1;
        padding: 25px 40px 10px 10px;
        width: 450px;
    }
    
    .post__avatar {
        padding: 20px;
    }
    
    /* widgets */
    .widgets {
        flex: 0.3;
        border-right: 1px solid var(--twitter-background);
        min-width: fit-content;
        overflow-y: scroll;
    }
    
    .logout {
        width: 80%;
        background-color: var(--twitter-color);
        border: none;
        color: white;
        font-weight: 900;
        border-radius: 30px;
        height: 50px;
        margin-top: 20px;
        margin-left: 40px;
        justify-content: space-between;
    }

    .widgets::-webkit-scrollbar {
        display: none;
    }

    .widgets__input {
        display: flex;
        align-items: center;
        background-color: var(--twitter-background);
        padding: 10px;
        border-radius: 20px;
        margin-top: 10px;
        margin-left: 20px;
    }
    
    .widgets__input input {
        border: none;
        background-color: var(--twitter-background);
    }
    
    .widgets__searchIcon {
        color: gray;
    }
    
    .widgets__widgetContainer {
        margin: 20px;
        padding: 20px;
        background-color: #f5f8fa;
        border-radius: 20px;
    }
    
    .widgets__widgetContainer h2 {
        font-size: 18px;
        font-weight: 800;
    }

    .dropdown{
        width: 150px;
        margin-left: 20px;
        margin-top: 10px;
    }

    textarea {
        border: none;
        outline: none;
    }

    .btn-circle.btn-sm {
        width: 54px;
        height: 35px;
        border-radius: 15px;
        font-size: 12px;
        text-align: center;
    }

    .container_comment_box{
        display: flex;
        flex-direction: row;
    }
    </style>

  </head>
  <body>
    <!-- sidebar starts -->
    <div class="sidebar">
        
        <i class="fab fa-twitter"></i>
        <form action="" method="GET" id="page_form" name="page_form">      
        
        <input type="hidden" name="controller" id="controller_left_sidebar" value="">
        <input type="hidden" name="action" id="sidebar_action" value="">
        <input type="hidden" name="openID" value=<?php echo $user->Open_Id; ?>>
        
        <div class="sidebarOption <?php if($controller == "home") echo "active" ?>" onclick="submit_page('home')">
            <span class="material-icons"> home </span>
            <h2>หน้าหลัก</h2>
        </div>

        <div class="sidebarOption <?php if($controller == "mypost") echo "active" ?>" onclick="submit_page('mypost')">
            <span class="material-icons"> search </span>
            <h2>โพสต์ของฉัน</h2>
        </div>
        <?php if($user->Role == "admin") ?>
        <div class="sidebarOption <?php if($controller == "report") echo "active" ?>" onclick="submit_page('report')">
            <span class="material-icons"> report </span>
            <h2>การรายงาน</h2>
        </div>

        </form>  
        <button class="sidebar__tweet" id="goto_post" >Comment</button>
    </div>
    <!-- sidebar ends -->
 <!-- ------------------------------------------------------------------------------------------------------------------------------------------------------------------ -->
    <!-- feed starts -->
    <div class="feed">
      <div class="feed__header">
        <h2>Post</h2>
      </div>

      <div class="post">
        <div class="post__avatar">

            <img src="https://i.pinimg.com/originals/a6/58/32/a65832155622ac173337874f02b218fb.png" alt=""/>
        </div>

        <div class="post__body">
          <div class="post__header">
            <div class="post__headerText">
                <div class="post__tag">
                    <div class="post__headerText__showbox"> <p><?php echo $post->Tag->Name; ?></p> </div>
                    <?php if ($user->Open_Id == $post->UserOpen_Id) { ?>
                        <div class="post__headerText__showbox"> <p> ของฉัน </p> </div>  
                    <?php }?>
                </div>
                <div class="post__time">
                    <div id="timebox"> <p><?php echo date_format($post->CreateDate,"d/m/y H:i"); ?></p> </div>
                </div>
            </div>
            <div class="post__headerDescription">
              <p <?php if($post->Status == "อยู่ระหว่างตรวจสอบ") echo 'style="color: red;"'; ?> > <?php echo $post->Content; ?></p>
            </div>
          </div>
        
          <form action="" method="GET" id="footerpost_form" name="footerpost_form">
            <div class="post__footer">
                <p></p>
                <p></p>
                <div class="container_comment_box">
                    <?php if($controller == "report" && $post->Status == "อยู่ระหว่างตรวจสอบ"){ ?> 
                    <button type="button" class="btn btn-outline-light btn-circle btn-sm" 
                                        onclick="click_approve('<?php echo $post->Content; ?>','updatePost','-1')"
                                        data-toggle="modal"
                                        data-target="#confirm_approve">
                        <i class="far fa-check-circle" style="color: black; font-size: 20px;"></i>
                    </button>
                    <?php } ?>
                    
                    <button type="button" class="btn btn-outline-light btn-circle btn-sm" 
                                        onclick="click_delete_or_report_or_ban('<?php echo $user->Open_Id == $post->UserOpen_Id; ?>','<?php echo $post->Content; ?>','updatePost','-1','<?php echo $user->Role == 2; ?>')"
                                        data-toggle="modal"
                                        data-target="<?php if ($user->Open_Id == $post->UserOpen_Id) echo "#confirm_delete"; else if($user->Role != 2) echo "#confirm_report"; else echo "#confirm_ban"; ?>" >
                        <i class="<?php if ($user->Open_Id == $post->UserOpen_Id) echo "fa fa-trash-o"; else if($user->Role != 2) echo "fa fa-flag-o"; else echo "fas fa-ban"; ?>" style="color: black; font-size: 20px;"></i>
                    </button>
                </div>              
            </div>
            <input type="hidden" name="controller" value="post">
            <input type="hidden" name="action" value="index">
            <input type="hidden" name="openID" value=<?php echo $user->Open_Id; ?>>
            <input type="hidden" name="post" value=<?php echo $post->Post_Id; ?>>
          </form>
        </div>
      </div>

      <!-- tweetbox starts -->
      <div class="tweetBox">

        <form>
            <div class="tweetbox__input">
                <img src="https://i.pinimg.com/originals/a6/58/32/a65832155622ac173337874f02b218fb.png"/>
                <textarea class='scroll' id="content" name="content" maxlength="250"></textarea>
            </div>
            <input type="hidden" name="controller" value="post"/>
            <input type="hidden" name="postID" value= <?php echo $post->Post_Id; ?>/>
            <button type="submit" class="tweetBox__tweetButton" name="action" value="addComment">Reply</button>
        </form>
      </div>
      <!-- tweetbox ends -->
      <?php if($commentList){ ?>
      <?php foreach($commentList as $comment){ ?>
      <!-- post starts -->
      <div class="post">
        <div class="post__avatar">

            <img src="https://i.pinimg.com/originals/a6/58/32/a65832155622ac173337874f02b218fb.png" alt=""/>
        </div>

        <div class="post__body">
          <div class="post__header">
            <div class="post__headerText">
                <div class="post__tag">
                    <div class="post__headerText__showbox"> <p><?php echo $comment->CommentNo; ?></p> </div>
                    <?php if ($user->Open_Id == $comment->UserOpen_Id) { ?>
                        <div class="post__headerText__showbox"> <p> ของฉัน </p> </div>  
                    <?php }?>
                </div>
                <div class="post__time">
                    <div id="timebox"> <p><?php echo date_format($comment->CreateDate,"d/m/y H:i"); ?></p> </div>
                </div>
            </div>

            <div class="post__headerDescription">
              <p <?php if($comment->Status == "อยู่ระหว่างตรวจสอบ") echo 'style="color: red;"'; ?> > <?php echo $comment->Content; ?></p>
            </div>
          </div>
        
          <form action="" method="GET" id="footerpost_form" name="footerpost_form">
            <div class="post__footer">
                <p></p>
                <p><?php echo $user->Open_Id." ".$comment->UserOpen_Id; ?></p>
                <div class="container_comment_box">
                    
                    <?php if($controller == "report" && $comment->Status == "อยู่ระหว่างตรวจสอบ"){ ?> 
                    <button type="button" class="btn btn-outline-light btn-circle btn-sm" 
                                        onclick="click_approve('<?php echo $comment->Content; ?>','updateComment','<?php echo $comment->Comment_Id; ?>')"
                                        data-toggle="modal"
                                        data-target="#confirm_approve">
                        <i class="far fa-check-circle" style="color: black; font-size: 20px;"></i>
                    </button>
                    <?php } ?>
                
                    <button type="button" class="btn btn-outline-light btn-circle btn-sm" 
                            onclick="click_delete_or_report_or_ban('<?php echo $user->Open_Id == $comment->UserOpen_Id; ?>','<?php echo $comment->Content; ?>','updateComment','<?php echo $comment->Comment_Id; ?>','<?php echo $user->Role == 2; ?>')"
                            data-toggle="modal"
                            data-target="<?php if ($user->Open_Id == $comment->UserOpen_Id) echo "#confirm_delete"; else if($user->Role != 2) echo "#confirm_report"; else echo "#confirm_ban"; ?>" >
                        <i  style="color: black; font-size: 20px;"
                            class="<?php if ($user->Open_Id == $comment->UserOpen_Id) echo "fa fa-trash-o"; else if($user->Role != 2) echo "fa fa-flag-o"; else echo "fas fa-ban"; ?>"></i>
                    </button>
                </div>             
            </div>
            <input type="hidden" name="controller" value="post">
            <input type="hidden" name="action" value="index">

          </form>
        </div>
      </div>
      <!-- post ends -->
      <?php }?>
      <?php }?>
    </div>
    <!-- feed ends -->

 <!-- ------------------------------------------------------------------------------------------------------------------------------------------------------------------ -->
    <div class="widgets">
        <!--                    
        <div class="widgets__input">
            <span class="material-icons widgets__searchIcon"> search </span>
            <input type="text" placeholder="Search Twitter" />
        </div> -->
        <form action="" method="GET">
            <input type="hidden" name="controller" value="login">
            <button type="submit" class="logout" name="action" value="logout">Log Out</button>
        </form>
        <div class="widgets__widgetContainer">       
            <form action="" method="GET" id="category_form" name="category_form">
                <?php foreach($tagList as $tag){ ?>
                    <div class="sidebarOption <?php if($tag->Tag_Id == $tagID) echo "active"; ?> " onclick="submit_category('<?php echo $tag->Tag_Id; ?>')">
                        <span class="fa fa-hashtag material-icons"></span>
                        <h2><?php echo $tag->Name; ?></h2>
                    </div>
                <?php }?>
                <input type="hidden" name="controller" value="home">
                <input type="hidden" name="action" value="index">
                <input type="hidden" name="openID" value=<?php echo $user->Open_Id; ?>>
                <input type="hidden" name="tag" id="tag_id" value="">
            </form>
        </div>

    </div>


    <!-- Modal -->
    <div class="modal fade" id="confirm_delete" tabindex="-1" role="dialog" aria-labelledby="confirm_delete" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="header_delete"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="post__headerDescription">
                        <p id=text_confirm_delete></p>
                    </div>
                </div>
                <div class="modal-footer">
                <form action="" method="GET">
                    <input type="hidden" name="controller" value="post">
                    <input type="hidden" name="status" value="0">
                    <input type="hidden" name="postID" value=<?php echo $post->Post_Id; ?>>
                    <input type="hidden" name="commentID" id="commentID_delete" value="">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                    <button type="submit" class="btn btn-danger" style="width: 69.49px; height: 38px;" 
                                                                 id="delete" name="action" value="" >ลบ</button>
                </form>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="confirm_ban" tabindex="-1" role="dialog" aria-labelledby="confirm_ban" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="header_ban"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="post__headerDescription">
                        <p id=text_confirm_ban></p>
                    </div>
                </div>
                <div class="modal-footer">
                <form action="" method="GET">
                    <input type="hidden" name="controller" value="post">
                    <input type="hidden" name="status" value="3">
                    <input type="hidden" name="postID" value=<?php echo $post->Post_Id; ?>>
                    <input type="hidden" name="commentID" id="commentID_ban" value="">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                    <button type="submit" class="btn btn-danger" style="width: 69.49px; height: 38px; padding-left: 10px;"
                                                                 id="ban" name="action" value="">แบน</button>
                </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="confirm_approve" tabindex="-1" role="dialog" aria-labelledby="confirm_approve" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="header_approve"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="post__headerDescription">
                        <p id=text_confirm_approve></p>
                    </div>
                </div>
                <div class="modal-footer">
                <form action="" method="GET">
                    <input type="hidden" name="controller" value="post">
                    <input type="hidden" name="status" value="1">
                    <input type="hidden" name="postID" value=<?php echo $post->Post_Id; ?>>
                    <input type="hidden" name="commentID" id="commentID_approve" value="">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                    <button type="submit" class="btn btn-danger" style="width: 69.49px; height: 38px; padding-left: 10px;"
                                                                 id="approve" name="action" value="">ยืนยัน</button>
                </form>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="confirm_report" tabindex="-1" role="dialog" aria-labelledby="confirm_report" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="header_report"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="post__headerDescription">
                        <p id=text_confirm_report></p>
                    </div>
                </div>
                <div class="modal-footer">
                <form action="" method="GET">
                    <input type="hidden" name="controller" value="post">
                    <input type="hidden" name="status" value="2">
                    <input type="hidden" name="postID" value=<?php echo $post->Post_Id; ?>>
                    <input type="hidden" name="commentID" id="commentID_report" value="">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                    <button type="submit" class="btn btn-danger" style="width: 69.49px; height: 38px; padding-left: 10px;"
                                                                 id="report" name="action" value="">รายงาน</button>
                </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal end -->


  </body>
</html>

<script>
    function submit_category(tag){
        document.getElementById("tag_id").value = tag;
        document.forms['category_form'].submit();
    }
    function submit_page(page){
        if(page == "home"){
            document.getElementById("sidebar_action").value = "index";
            document.getElementById("controller_left_sidebar").value = "home";
        }
        else if(page == "mypost"){
            document.getElementById("sidebar_action").value = "index";
            document.getElementById("controller_left_sidebar").value = "mypost";
        }
        else if(page == "report"){
            document.getElementById("sidebar_action").value = "index";
            document.getElementById("controller_left_sidebar").value = "report";
        }
        document.forms['page_form'].submit();
    }
    function GoToCommentPage(){
        document.forms['footerpost_form'].submit();
    }

    document.getElementById('goto_post').onclick = function() {  
        document.getElementById('content').focus();
    };

    $('#myModal').on('shown.bs.modal', function () {
        console.log('xxxx');
        $('#myInput').trigger('focus')
    })

    $("textarea").each(function () {
      this.setAttribute("style", "height:" + (this.scrollHeight) + "px;overflow-y:hidden;");
    }).on("input", function () {
      this.style.height = 0;
      this.style.height = (this.scrollHeight) + "px";
    });

    function click_delete_or_report_or_ban(isdelete, content, type, commentID, isadmin){ // type = updatePost , updateComment
        let a = "";
        if(type == "updatePost")
            a = "โพสต์";    
        else
            a = "คอมเมนต์";
        console.log(isdelete);
        if(isdelete == "1"){
            let b = "คุณต้องการลบ";
            let c = b.concat(a);
            c = c.concat("นี้หรือไม่");
            document.getElementById("text_confirm_delete").innerHTML = content;
            document.getElementById("header_delete").innerHTML = c;
            document.getElementById("delete").value = type;
            if(type == "updateComment") document.getElementById("commentID_delete").value = commentID;
        }
        else{
            if(isadmin != "1"){
                let b = "คุณต้องการรายงาน";
                let c = b.concat(a);
                c = c.concat("นี้หรือไม่");
                document.getElementById("text_confirm_report").innerHTML = content;
                document.getElementById("header_report").innerHTML = c;
                document.getElementById("report").value = type;
                if(type == "updateComment") document.getElementById("commentID_report").value = commentID;
            }
            else{
                let b = "คุณต้องการแบน";
                let c = b.concat(a);
                c = c.concat("นี้หรือไม่");
                document.getElementById("text_confirm_ban").innerHTML = content;
                document.getElementById("header_ban").innerHTML = c;
                document.getElementById("ban").value = type;
                if(type == "updateComment") document.getElementById("commentID_ban").value = commentID;
            } 
        }
    }

    function click_approve(content, type, commentID){
        console.log(type);
        console.log(commentID);
        if(type == "updatePost"){
            document.getElementById("header_approve").innerHTML = "ตุณต้องการยืนยันความถูกต้องของโพสต์";
        }
        else{
            document.getElementById("header_approve").innerHTML = "ตุณต้องการยืนยันความถูกต้องของคอมเมนต์";
            document.getElementById("commentID_approve").value = commentID;
        }
        document.getElementById("text_confirm_approve").innerHTML = content;
        document.getElementById("approve").value = type;
    }

</script>