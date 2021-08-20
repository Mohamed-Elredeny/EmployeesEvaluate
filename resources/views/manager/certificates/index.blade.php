<html>

<head><meta http-equiv=Content-Type content="text/html; charset=UTF-8">

<form>
    <input type="button" value="Click Me" onclick="codespeedy()">
</form>
</body>
</html>
    <script type="text/javascript" src="7b426128-f756-11eb-a980-0cc47a792c0a_id_7b426128-f756-11eb-a980-0cc47a792c0a_files/wz_jsgraphics.js"></script>
</head>
<body>

<div id="hello">
    <?php   $certificates =\App\models\admin\Certificate::get(); ?>
    @for($i=0;$i<count($certificates);$i++)
        <?php
        $name_ar =$certificates[$i]['name_ar'];
        $name_en =$certificates[$i]['name_en'];
        $program_ar =$certificates[$i]['program_ar'];
        $program_en =$certificates[$i]['program_en'];
        $real_date=$certificates[$i]['date'];
        $num = $certificates[$i]['number'];
        ?>
        <div style="height:100%">
            <div  style="position:relative;left:50%;margin-left:-420px;top:0px;width:841px;height:595px;border-style:outset;overflow:hidden">
                <style type="text/css">
                    <!--
                    span.cls_003{font-family:"Calibri Bold",serif;font-size:18.1px;color:rgb(0,102,0);font-weight:bold;font-style:normal;text-decoration: none}
                    div.cls_003{font-family:"Calibri Bold",serif;font-size:18.1px;color:rgb(0,102,0);font-weight:bold;font-style:normal;text-decoration: none}
                    span.cls_004{font-family:Arial,serif;font-size:18.1px;color:rgb(0,102,0);font-weight:normal;font-style:normal;text-decoration: none}
                    div.cls_004{font-family:Arial,serif;font-size:18.1px;color:rgb(0,102,0);font-weight:normal;font-style:normal;text-decoration: none}
                    span.cls_005{font-family:Arial,serif;font-size:18.1px;color:rgb(0,102,0);font-weight:normal;font-style:normal;text-decoration: none}
                    div.cls_005{font-family:Arial,serif;font-size:18.1px;color:rgb(0,102,0);font-weight:normal;font-style:normal;text-decoration: none}
                    span.cls_006{font-family:"Calibri Bold",serif;font-size:18.1px;color:rgb(0,102,0);font-weight:bold;font-style:normal;text-decoration: none}
                    div.cls_006{font-family:"Calibri Bold",serif;font-size:18.1px;color:rgb(0,102,0);font-weight:bold;font-style:normal;text-decoration: none}
                    span.cls_007{font-family:"Edwardian Script ITC",serif;font-size:55.0px;color:rgb(29,0,238);font-weight:normal;font-style:normal;text-decoration: none}
                    div.cls_007{font-family:"Edwardian Script ITC",serif;font-size:55.0px;color:rgb(29,0,238);font-weight:normal;font-style:normal;text-decoration: none}
                    span.cls_008{font-family:"Calibri Bold",serif;font-size:48.0px;color:rgb(29,0,238);font-weight:bold;font-style:normal;text-decoration: none}
                    div.cls_008{font-family:"Calibri Bold",serif;font-size:48.0px;color:rgb(29,0,238);font-weight:bold;font-style:normal;text-decoration: none}
                    span.cls_011{font-family:Garamond,serif;font-size:18.1px;color:rgb(13,13,13);font-weight:bold;font-style:normal;text-decoration: none}
                    div.cls_011{font-family:Garamond,serif;font-size:18.1px;color:rgb(13,13,13);font-weight:bold;font-style:normal;text-decoration: none}
                    span.cls_012{font-family:Times,serif;font-size:18.1px;color:rgb(13,13,13);font-weight:bold;font-style:normal;text-decoration: none}
                    div.cls_012{font-family:Times,serif;font-size:18.1px;color:rgb(13,13,13);font-weight:bold;font-style:normal;text-decoration: none}
                    span.cls_016{font-family:"Calibri Bold",serif;font-size:20.1px;color:rgb(115,0,0);font-weight:bold;font-style:normal;text-decoration: none}
                    div.cls_016{font-family:"Calibri Bold",serif;font-size:20.1px;color:rgb(115,0,0);font-weight:bold;font-style:normal;text-decoration: none}
                    span.cls_018{font-family:Times,serif;font-size:14.1px;color:rgb(0,0,0);font-weight:bold;font-style:italic;text-decoration: none}
                    div.cls_018{font-family:Times,serif;font-size:14.1px;color:rgb(0,0,0);font-weight:bold;font-style:italic;text-decoration: none}
                    span.cls_015{font-family:Times,serif;font-size:14.1px;color:rgb(146,208,80);font-weight:bold;font-style:italic;text-decoration: none}
                    div.cls_015{font-family:Times,serif;font-size:14.1px;color:rgb(146,208,80);font-weight:bold;font-style:italic;text-decoration: none}
                    span.cls_020{font-family:Times,serif;font-size:16.0px;color:rgb(115,0,0);font-weight:bold;font-style:italic;text-decoration: none}
                    div.cls_020{font-family:Times,serif;font-size:16.0px;color:rgb(115,0,0);font-weight:bold;font-style:italic;text-decoration: none}
                    -->
                </style>

                <div style="position:absolute;left:0px;top:0px">
                    <img src="https://firebasestorage.googleapis.com/v0/b/camels-3e434.appspot.com/o/background1.jpg?alt=media&token=a3c5a65a-c111-4e86-8424-814d9008b680" width=841 height=595></div>
                <div style="position:absolute;left:636.70px;top:39.09px" class="cls_003"><span class="cls_003">شركة جرين بيزنيس سوليوشن</span><span class="cls_004"></span></div>
                <div style="position:absolute;left:36.24px;top:44.34px" class="cls_005"><span class="cls_005">GREEN Business Solutions, GBS</span></div>
                <div style="position:absolute;left:647.74px;top:71.10px" class="cls_006"><span class="cls_006">قسم التدريب لنظم الجودة</span></div>
                <div style="position:absolute;left:36.24px;top:74.82px" class="cls_005"><span class="cls_005">Training Department for Quality Systems</span></div>
                <div style="position:absolute;left:150.62px;top:125.32px" class="cls_007"><span class="cls_0    07">Certificate</span></div>
                <div style="position:absolute;left:575.43px;top:140.25px" class="cls_008"><span class="cls_008">شهادة</span></div>
                <div style="position:absolute;left:100.82px;top:208.65px" class="cls_011"><span class="cls_011">Training Department  Certify That:</span></div>
                <div class='cls_008' style='position:absolute;left:110.82px;top:250px;' ><span class='cls_007' style="color:red;font-size: 33px;font-weight:bolder"><?php echo $name_en ?></span></div>

                <div style="position:absolute;left:560.67px;top:212.85px" class="cls_012"><span class="cls_012">يشهد قسم التدريب بأن </span></div>
                <div class="cls_012" style="position:absolute;left:575.67px;top:260px;" >
                    <center>

                    <span class="cls_012" style="color:red;font-weight:bolder;font-size: 20px"><?php echo $name_ar ?></span>
                    </center>

                </div>


                <div style="position:absolute;left:82.10px;top:303.71px" class="cls_012"><span class="cls_012">Participate in training program entitled</span></div>
                <div style='position:absolute;left:122.10px;top:350.71px' class='cls_012'><span class='cls_012' style="font-weight:bolder;color: navy"><?php echo $program_en ?></span>
                </div>

                <div style="position:absolute;left:545.36px;top:303.71px" class="cls_012"><span class="cls_012">قد حضر البرنامج التدريبي</span></div>
                <div style='position:absolute;left:555.36px;top:350.71px' class='cls_012'><span class='cls_012' style="font-weight:bolder;color: navy"><?php echo $program_ar ?></span>
                </div>
                <div style='position:absolute;left:375.36px;top:400.71px' class='cls_012'><span class='cls_012' style="font-weight:bolder;color:navy;font-size:25px"><?php echo $real_date ?></span>
                </div>
                <div style="position:absolute;left:103.94px;top:449.42px" class="cls_016"><span class="cls_016">Trainer</span></div>
                <div style="position:absolute;left:270.71px;top:449.42px" class="cls_016"><span class="cls_016">Training Consultant</span></div>
                <div style="position:absolute;left:507.99px;top:449.42px" class="cls_016"><span class="cls_016">GBS Training Dept. Manager</span></div>
                <div style="position:absolute;left:55.44px;top:530.30px" class="cls_018"><span class="cls_018">Mail: : info@greenbs.org</span></div>
                <div style="position:absolute;left:216.14px;top:530.30px" class="cls_018"><span class="cls_018">- Off: +2 02 2526 58 28</span></div>
                <div style="position:absolute;left:48.12px;top:551.56px" class="cls_018"><span class="cls_018">Web: </span><A HREF="http://www.greenbs.org/">www.greenbs.org</A> </div>
                <div style="position:absolute;left:215.18px;top:551.56px" class="cls_018"><span class="cls_018">-   Add: 28, 105 ST, Maadi, Cairo, Egypt (Head office</span><span class="cls_015">)</span></div>
                <div style="position:absolute;left:578.47px;top:549.64px" class="cls_020"><span class="cls_020">Certificate No <?php echo $num ?></span></div>
            </div>
        </div>
            <br>
    @endfor
</div>


<script type="text/javascript">

    function codespeedy(){
        var print_div = document.getElementById("hello");
        var print_area = window.open();
        print_area.document.write(print_div.innerHTML);
        print_area.document.close();
        print_area.focus();
        print_area.print();
        print_area.close();
// This is the code print a particular div element
    }

</script>
</body>
</html>
