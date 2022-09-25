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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    
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
    
    .tweetbox__input input {
        flex: 1;
        margin-left: 20px;
        font-size: 20px;
        border: none;
        outline: none;
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
    
    .post__headerText h3 {
        font-size: 15px;
        margin-bottom: 5px;
    }
    
    .post__headerDescription {
        margin-bottom: 10px;
        font-size: 15px;
        word-wrap: break-word;
    }
    
    .post__body {
        flex: 1;
        padding: 10px;
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

    textarea {
        border: none;
        outline: none;
    }
    </style>

  </head>
  <body>
    <!-- sidebar starts -->
    <div class="sidebar">
      <i class="fab fa-twitter"></i>
      <div class="sidebarOption active">
        <span class="material-icons"> home </span>
        <h2>รายงาน</h2>
      </div>

      <div class="sidebarOption">
        <span class="material-icons"> search </span>
        <h2>โพสต์ของฉัน</h2>
      </div>

      <button class="sidebar__tweet">Tweet</button>
    </div>
    <!-- sidebar ends -->

    <!-- feed starts -->
    <div class="feed">
      <div class="feed__header">
        <h2>Home</h2>
      </div>

      <!-- tweetbox starts -->
      <div class="tweetBox">
        <form>
            <div class="btn-group">
                <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Small button
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
            </div>
            <div class="tweetbox__input">
                <img src="https://i.pinimg.com/originals/a6/58/32/a65832155622ac173337874f02b218fb.png"/>
                <input type="text" placeholder="What's happening?" />
            </div>
            <button class="tweetBox__tweetButton">Tweet</button>
        </form>
      </div>
      <!-- tweetbox ends -->
    
      <?php for( $i = 0 ; $i < 10 ; $i++){ ?>
      <!-- post starts -->
      <div class="post">
        <div class="post__avatar">

            <img src="https://i.pinimg.com/originals/a6/58/32/a65832155622ac173337874f02b218fb.png" alt=""/>
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
              <p> Lorem300</p>
            </div>
          </div>
        
          <div class="post__footer">
            <span class="material-icons"> repeat </span>
            <span class="material-icons"> favorite_border </span>
            <span class="material-icons"> publish </span>
          </div>
        </div>
      </div>
      <!-- post ends -->
      <?php }?>
    </div>
    <!-- feed ends -->


    <div class="widgets">

        <div class="widgets__input">
            <span class="material-icons widgets__searchIcon"> search </span>
            <input type="text" placeholder="Search Twitter" />
        </div>

        <div class="widgets__widgetContainer">       
            <?php foreach($tagList as $tag){ ?>
                <div class="sidebarOption">
                <span class="material-icons"> notifications_none </span>
                <h2><?php echo $tag->Name; ?></h2>
            </div>
            <?php }?>
        </div>

    </div>

  </body>
</html>