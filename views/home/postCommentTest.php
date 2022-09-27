<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Twitter Clone - Final</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
      integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
      crossorigin="anonymous"
    />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- fontawesome -->
    <script src="https://kit.fontawesome.com/0cd9ed0a28.js" crossorigin="anonymous"></script>
    <!-- Textarea -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

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
        height: 40px;
    }
    
    .tweetBox {
        padding-bottom: 10px;
        border-bottom: 2px solid var(--twitter-background);
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
    
    .scroll::-webkit-scrollbar {
      display: none;
    }
    
    .tweetBox__tweetButton {
        background-color: var(--twitter-color);
        border: none;
        color: white;
        font-weight: 900;
    
        border-radius: 30px;
        width: 80px;
        height: 40px;
        margin-top: 0px;
        margin-left: auto;
    }
    
    /* post */
    .post__avatar img {
        border-radius: 50%;
        height: 40px;
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
        justify-content: end;
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
    
    .post__headerText h3 {
        font-size: 15px;
        margin-bottom: 5px;
    }
    
    .post__headerDescription {
        margin-bottom: 10px;
        width: 450px;
        font-size: 15px;
    }
    
    .post__body {
        flex: 1;
        padding: 10px;
    }
    
    .post__avatar {
        padding: 20px;
    }
    
    /* widgets */
    .widgets {
        flex: 0.3;
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
        margin-top: 15px;
        margin-left: 20px;
        padding: 20px;
        background-color: #f5f8fa;
        border-radius: 20px;
    }
    
    .widgets__widgetContainer h2 {
        font-size: 18px;
        font-weight: 800;
    }
    
    .btn-circle.btn-sm {
        width: 40px;
        height: 40px;
        border-radius: 15px;
        font-size: 12px;
        text-align: center;
    }

    </style>
    
    <script>
        $('#myModal').on('shown.bs.modal', function () {
        $('#myInput').trigger('focus')
      })
    </script>
    
  </head>
  <body>
    <!-- sidebar starts -->
    <div class="sidebar">
      <i class="fab fa-twitter"></i>
      <div class="sidebarOption active">
        <span class="material-icons"> home </span>
        <h2>Home</h2>
      </div>

      <div class="sidebarOption">
        <span class="material-icons"> search </span>
        <h2>Explore</h2>
      </div>

      <div class="sidebarOption">
        <span class="material-icons"> notifications_none </span>
        <h2>Notifications</h2>
      </div>

      <div class="sidebarOption">
        <span class="material-icons"> mail_outline </span>
        <h2>Messages</h2>
      </div>

      <div class="sidebarOption">
        <span class="material-icons"> bookmark_border </span>
        <h2>Bookmarks</h2>
      </div>

      <div class="sidebarOption">
        <span class="material-icons"> list_alt </span>
        <h2>Lists</h2>
      </div>

      <div class="sidebarOption">
        <span class="material-icons"> perm_identity </span>
        <h2>Profile</h2>
      </div>

      <div class="sidebarOption">
        <span class="material-icons"> more_horiz </span>
        <h2>More</h2>
      </div>
      <button class="sidebar__tweet">Tweet</button>
    </div>
    <!-- sidebar ends -->

    <!-- feed starts -->
    <div class="feed">
      <div class="feed__header">
        <h2>Post</h2>
      </div>

      <!-- post starts -->
      <div class="post">
        <div class="post__avatar">
          <img
            src="https://i.pinimg.com/originals/a6/58/32/a65832155622ac173337874f02b218fb.png"
            alt=""
          />
        </div>

        <div class="post__body">
          <div class="post__header">
            <div class="post__headerText">
              <h3>
                Somanath Goudar
                <span class="post__headerSpecial"
                  ><span class="material-icons post__badge"> verified </span>@somanathg</span
                >
              </h3>
            </div>
            <div class="post__headerDescription">
              <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quia iure voluptas, accusantium nulla mollitia maiores, blanditiis in dignissimos nam delectus quod recusandae ad officia eaque voluptates, officiis similique qui tempore!</p>
            </div>
          </div>
          <img
            src="https://www.focus2move.com/wp-content/uploads/2020/01/Tesla-Roadster-2020-1024-03.jpg"
            alt=""
          />
          <div class="post__footer">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-outline-light btn-circle btn-sm" data-toggle="modal" data-target="#exampleModalCenter">
              <i class="far fa-comment" style="color: black; font-size: 14px;"></i>
            </button>
            <button type="button" class="btn btn-outline-light btn-circle btn-sm" data-toggle="modal" data-target="#reportPost">
            <i class="fa-regular fa-flag" style="color: black; font-size: 14px;"></i>
            </button>
            
            <button type="button" class="btn btn-outline-light btn-circle btn-sm" data-toggle="modal" data-target="#exampleModalCenter">
            <i class="fa fa-trash-o" style="color: black; font-size: 14px;"></i>
            </button>

            <!-- Modal Report -->
            <div class="modal fade" id="reportPost" tabindex="-1" role="dialog" aria-labelledby="reportPost" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">คุณต้องการรายงานโพสต์นี้หรือไม่</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                      <div class="post__headerDescription">
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quia iure voluptas, accusantium nulla mollitia maiores, blanditiis in dignissimos nam delectus quod recusandae ad officia eaque voluptates, officiis similique qui tempore!</p>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                        <label class="form-check-label" for="defaultCheck1">
                          ไม่สุภาพ
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck2">
                        <label class="form-check-label" for="defaultCheck2">
                          ล้อเรียน
                        </label>
                      </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                    <button type="button" class="btn btn-danger" style="width: 69.49px; height: 38px; padding-left: 10px;">รายงาน</button>
                  </div>
                </div>
              </div>
            </div>
            <!-- Modal end -->
            <!-- Modal -->
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenter" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">คุณต้องการลบโพสต์นี้หรือไม่</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                      <div class="post__headerDescription">
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quia iure voluptas, accusantium nulla mollitia maiores, blanditiis in dignissimos nam delectus quod recusandae ad officia eaque voluptates, officiis similique qui tempore!</p>
                      </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                    <button type="button" class="btn btn-danger" style="width: 69.49px; height: 38px;">ลบ</button>
                  </div>
                </div>
              </div>
            </div>
            <!-- Modal end -->
          </div>
        </div>
      </div>
      <!-- post ends -->
      <!-- tweetbox starts -->
      <div class="tweetBox">
        <form>
          <div class="tweetbox__input">
            <img
              src="https://i.pinimg.com/originals/a6/58/32/a65832155622ac173337874f02b218fb.png"
              alt=""
            />
            <textarea class='scroll' name="textarea" maxlength="250"></textarea>
          </div>
          <button class="tweetBox__tweetButton">Reply</button>
        </form>
      </div>
      <!-- tweetbox ends -->

      <?php for ($x = 0; $x <= 5; $x++) {?>
      <!-- comment starts -->
      <div class="post">
        <div class="post__avatar">
          <img
            src="https://i.pinimg.com/originals/a6/58/32/a65832155622ac173337874f02b218fb.png"
            alt=""
          />
        </div>

        <div class="post__body">
          <div class="post__header">
            <div class="post__headerText">
              <h3>
                Somanath Goudar
                <span class="post__headerSpecial"
                  ><span class="material-icons post__badge"> verified </span>@somanathg</span><span style="margin-left: 200px; font-size: 6px; color: black;">08.00 AM. 24 sep 2019 </span>
              </h3>
            </div> 
            <div class="post__headerDescription">
              <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit.</p>
            </div>
          </div>
          <div class="post__footer">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-outline-light btn-circle btn-sm" data-toggle="modal" data-target="#reportComment">
            <i class="fa-regular fa-flag" style="color: black; font-size: 14px;"></i>
            </button>
            

            <!-- Modal -->
            <div class="modal fade" id="reportComment" tabindex="-1" role="dialog" aria-labelledby="reportComment" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">คุณต้องการรายงานความคิดเห็นนี้หรือไม่</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                      <div class="post__headerDescription">
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit.</p>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                        <label class="form-check-label" for="defaultCheck1">
                          ไม่สุภาพ
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck2">
                        <label class="form-check-label" for="defaultCheck2">
                          ล้อเรียน
                        </label>
                      </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                    <button type="button" class="btn btn-danger" style="width: 69.49px; height: 38px; padding-left: 10px;">รายงาน</button>
                  </div>
                </div>
              </div>
            </div>
            <!-- Modal end -->
          </div>
        </div>
      </div>
      <!-- comment ends -->
      <?php } ?>
    </div>
    <!-- feed ends -->

    <!-- widgets starts -->
    <div class="widgets">
      <div class="widgets__input">
        <span class="material-icons widgets__searchIcon"> search </span>
        <input type="text" placeholder="Search Twitter" />
      </div>

      <div class="widgets__widgetContainer">
        <h2>What's happening?</h2>
        <blockquote class="twitter-tweet">
          <p lang="en" dir="ltr">
            Sunsets don&#39;t get much better than this one over
            <a href="https://twitter.com/GrandTetonNPS?ref_src=twsrc%5Etfw">@GrandTetonNPS</a>.
            <a href="https://twitter.com/hashtag/nature?src=hash&amp;ref_src=twsrc%5Etfw"
              >#nature</a
            >
            <a href="https://twitter.com/hashtag/sunset?src=hash&amp;ref_src=twsrc%5Etfw"
              >#sunset</a
            >
            <a href="http://t.co/YuKy2rcjyU">pic.twitter.com/YuKy2rcjyU</a>
          </p>
          &mdash; US Department of the Interior (@Interior)
          <a href="https://twitter.com/Interior/status/463440424141459456?ref_src=twsrc%5Etfw"
            >May 5, 2014</a
          >
        </blockquote>
        <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
      </div>
    </div>
    <!-- widgets ends -->
  </body>
  <script>
    $("textarea").each(function () {
      this.setAttribute("style", "height:" + (this.scrollHeight) + "px;overflow-y:hidden;");
    }).on("input", function () {
      this.style.height = 0;
      this.style.height = (this.scrollHeight) + "px";
    });
  </script>
</html>
