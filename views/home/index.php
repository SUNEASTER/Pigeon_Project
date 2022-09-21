<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>  <!--chart-->

<style>
    @import url('https://fonts.googleapis.com/css2?family=Open+Sans&display=swap');
    @import url('https://fonts.googleapis.com/css?family=Kanit%7CPrompt');

    /* กล่องใหญ่ */
    .flexbox2{
        margin: 15% 15%;
        margin-top: 50px;
        flex-direction: row;
        flex-wrap: wrap;
    }

    .flexbox{
        display: flex;
        box-sizing: border-box;
        flex-direction: column;
        justify-content: space-evenly;
        flex-wrap: wrap;
        /* border: 2px solid #054468;  */
        margin-bottom: 15px;
        padding: 20px 20px 20px 20px;
        border-radius: 24px;
        transition: 0.4s;
    }
    
    /* กล่องเล็ก */
    .box{
        display: block;
        box-sizing: border-box;
        width: 100%;
        /* border: 3px solid black; */
        margin-top: 50px;
    }

    .flexbox-in{
        display: flex;
        box-sizing: border-box;
        flex-direction: row;
        flex-wrap: wrap;
        /* border: 3px solid black; */
    }

    .box-in  {
        display: block;
        box-sizing: border-box;
        /* border: 3px solid black; */
        width: 50%;
    }

    .imgx{
        width: 100%;
        object-fit: cover;
        border-radius: 30px;
        border: 4px solid #054468 ;
    }

    .imgx:hover{
        border: 7px solid rgb(7, 105, 185);
    }

</style>

<div class="section">  <!-- แก้ในนี้ -->
    <div class="container bg">
        <div class="flexbox2">
            <div class="flexbox">
                <div class="flexbox">
                    <div class="box">
                        <img class="imgx" src="/resources/1.jpg" alt="1">
                    </div>
                    <div class="box">
                        <img class="imgx" src="/resources/2.jpg" alt="2">
                    </div>
                    <div class="box">
                        <img class="imgx" src="/resources/3.jpg" alt="3">
                    </div>
                    <div class="box">
                        <img class="imgx" src="/resources/4.jpg" alt="4">
                    </div>
                </div>
            </div>
        </div>
    </div> 
</div> 

