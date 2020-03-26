<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="./index.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    </head>
    <body>
      <div class="center">
        <div class="top3">
          <div class="two item">
            <div class="pos">
              2
            </div>
            <div class="pic" style="background-image: url(&#39;https://randomuser.me/api/portraits/men/44.jpg&#39;)"></div>
            <div class="name">
              Ifihan Olusheye
            </div>
            <div class="score">
              30
            </div>
          </div>
          <div class="one item">
            <div class="pos">
              1
            </div>
            <div class="pic" style="background-image: url(&#39;https://randomuser.me/api/portraits/men/31.jpg&#39;)"></div>
            <div class="name">
              Geektutor
            </div>
            <div class="score">
              10
            </div>
          </div>
          <div class="three item">
            <div class="pos">
              3
            </div>
            <div class="pic" style="background-image: url(&#39;https://randomuser.me/api/portraits/women/91.jpg&#39;)"></div>
            <div class="name">
              Akin Aguda
            </div>
            <div class="score">
              50
            </div>
          </div>
        </div>
          <div class="list">
          </div>
        </div>
      <script>
      $.ajax({
        url : "./results.json",
        success : function(result) {
          //result);
          updateRankings(result);
        },
      })
      function updateRankings(ranks) {
        function trim(url){
          return url.split(' ').join('');
        }
        //update first position
        var first = ranks[0];
        $('div.one .name').text(first.nickname);
        $('div.one .pic').css({"background-image": `url(https://robohash.org/${trim(first.nickname+first.track)})`});
        $('div.one .score').text(first.score);

        //update second Position
        var second = ranks[1];
        $('div.two .name').text(second.nickname);
        $('div.two .pic').css({"background-image": `url(https://robohash.org/${trim(second.nickname+second.track)})`});
        $('div.two .score').text(second.score);

        //update third position
        var third = ranks[2];
        $('div.three .name').text(third.nickname);
        $('div.three .pic').css({"background-image": `url(https://robohash.org/${trim(third.nickname+third.track)})`});
        $('div.three .score').text(third.score);

        //update the rest
        var starter = 4
        for (let i = 3; i < ranks.length; i++) {
          var markup =`
          <div class="item">
              <div class="pos">
                ${starter}
              </div>
              <div class="pic" style="background-image: url(https://robohash.org/${trim(ranks[i].nickname+ranks[i].track)})"></div>
              <div class="name">
                ${ranks[i].nickname}
              </div>
              <div class="score">
                ${ranks[i].score}
              </div>
            </div>`;
          $('div.list').append(markup);
          starter++
        }
      }
    //   $("body").css("overflow-y", "auto");
    //   $("html").css("overflow-y", "auto");
      </script>
    </body>
</html>