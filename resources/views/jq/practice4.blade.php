<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</head>
<body>
    
    <div id="output"></div>
    <script>
      var data =
      [{
        "division": "A組",
         "person": [
          {
            "name" : "阿部",
            "age"  : 22
           },
           {
              "name" : "本田",
              "age"  : 46
            },
            {
               "name" : "田中",
               "age": 35
            }
            ]
      },
      {
        "division": "B組",
         "person": [
          {
            "name" : "大谷",
            "age"  : 21
           },
           {
             "name" : "大野",
             "age"  : 41
            },
            {
               "name" : "中田",
               "age": 32
             }
             ]
      }];
     
      // JSONデータの表示
     for(var i in data){
         $("#output").append("<div>【" + data[i].division + "】</div>");
             for(var j in data[i].person){
                $("#output").append("<div>" + data[i].person[j].name + "（" + data[i].person[j].age + "才）</div>");
             }
     }
    </script>
</body>
</html>