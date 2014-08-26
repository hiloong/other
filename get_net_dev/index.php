<!Doctype html>
<html>
    <head>
        <title>hiloong</title>
        <script src='http://libs.baidu.com/jquery/1.8.3/jquery.js'></script>
        <style>
            #canvas { margin: 0 auto;}
        </style>
<script>

var x, y, z = 0;
var a, b;
function f() {
    $.ajax({
        url: 'data.php',
        method: 'get',
        cache: false,
        success : function (data) { 
            $("#info").html(data);

            var data = eval("(" + data + ")");
            x = data.in_bit;
            a = data.out_bit;
            if(z) {
                $("#end").html("<div>下载速度</div>");
                $("#end").append("<div>" + (x-y) + 'bit' + "</div>");
                $("#end").append("<div>"+ (x-y)/1024 + 'kbps' +"</div>");
                $("#end").append("<div>"+ (x-y)/1024/1024 + 'mbps' +"</div>");

                

                $("#end").append("<div>上传速度</div>");
                $("#end").append("<div>" + (a-b) + 'bit' + "</div>");
                $("#end").append("<div>"+ (a-b)/1024 + 'kbps' +"</div>");
                $("#end").append("<div>"+ (a-b)/1024/1024 + 'mbps' +"</div>");
            }
            y = x;
            b = a;
            z += 1;
        }
    });
}

</script>


<script>
    $(function () {
        setInterval(f, 1000);
    
    });
</script>
    </head>

    <body>
<div id='info'>
</div>

<div id='end'>
</div>


    </body>

</html>
