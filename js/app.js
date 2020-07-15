if (!(/msie [6|7|8|9]/i.test(navigator.userAgent))){
  new WOW().init();
};
$('.header_lang').wSelect();
$('.header_lang').val('EN').change(); // should see in console
//$('.header_opt').css('color','#b3dbc0');
/* */
/*$(function(){
(function(){
function animate(item, x, y, index) {
 dynamics.animate(item, {
   translateX: x,
   translateY: y,
   opacity: 1
  }, {
    type: dynamics.spring,
    duration: 800,
    frequency: 120,
    delay: 100 + index * 30
  });
}

minigrid('.case_item_menu', '.item', 6, animate);

window.addEventListener('resize', function(){
  minigrid('.case_item_menu', '.item', 6, animate);
});
})();
})*/
$(".index_search_box .search_sele").mouseenter(function(){
  $(this).children(".search_sele_btn").addClass("hover")
})
$(".index_search_box .search_sele .search_sele_btn").mouseleave(function(){
  $(this).removeClass("hover")
})
$(".case_item_menu .item").mouseenter(function(){
  $(this).toggleClass("hover")
})
$(".case_item_menu .item").mouseleave(function(){
  $(this).toggleClass("hover")
})
/* */
$(".campsite_content_box .item").mouseenter(function(){
  $(this).toggleClass("hover")
})
$(".campsite_content_box .item").mouseleave(function(){
  $(this).toggleClass("hover")
})

/* */
$(".tutor_tip_navi .list dd .lab_box").click(function(){
  if($(this).hasClass("active") == true){
      $(this).removeClass("active");
      $(this).find("input[type=checkbox]").removeAttr("checked");
  }else{
    $(this).addClass("active");
    $(this).find("input[type=checkbox]").attr("checked","checked");

  }

})
/* */
var competi_bit_box = new Swiper('.competi_bit_box', {
      spaceBetween: 10,
      slidesPerView: 10,
      freeMode: true,
      watchSlidesVisibility: true,
      watchSlidesProgress: true,
    });
    var galleryTop = new Swiper('.competi_tis_box', {
      spaceBetween: 10,
      navigation: {
        nextEl: '.competi_bit_next',
        prevEl: '.competi_bit_prev',
      },
      thumbs: {
        swiper: competi_bit_box
      }
});
/* */

window.onload = function(){
/*
function animate(item, x, y, index) {
 dynamics.animate(item, {
   translateX: x,
   translateY: y,
   opacity: 1
  }, {
    type: dynamics.spring,
    duration: 800,
    frequency: 120,
    delay: 100 + index * 30
  });
}
*/

minigrid('.campsite_detail_item', '.item', 5, animate);


window.addEventListener('resize', function(){
  minigrid('.campsite_detail_item', '.item', 5, animate);
});
}

/* */
var fileInput = document.querySelector('#authen_file'),
    previewImg = document.querySelector('#authen_img');
  fileInput.addEventListener('change', function () {
      var file = this.files[0];
      var reader = new FileReader();
      // 监听reader对象的的onload事件，当图片加载完成时，把base64编码賦值给预览图片
      reader.addEventListener("load", function () {
          previewImg.src = reader.result;
          $(".regis_content_box .content_box .authen_image .cont_box .authen_image_box").show();
      }, false);
      // 调用reader.readAsDataURL()方法，把图片转成base64
      reader.readAsDataURL(file);
  }, false);
$(".authen_image_box .shut").click(function(){
  $(this).parent(".authen_image_box").hide();
  $(this).siblings("img").attr("src","");
})

/* */
function conM(){
    document.getElementById("priceTotalContent").innerHTML=("                                    <div class=\"card d-line-block\">\n" +
        "                                      <br>\n" +
        "                                        <i style=\"font-size:24px;color:#689777\" class=\"fa\">&#xf1d8;</i>\n" +
        "                                        <h4 style=\"padding-top: 15px\"><b>Basic</b></h4>\n" +
        "                                        <hr width=\"5%\" style=\"margin:auto;border-color:#689777;\">\n" +
        "                                      <h3 style=\"padding-top: 15px\" id=\"basicTotal\">$195/mo</h3>\n" +
        "\n" +
        "                                      <br>\n" +
        "                                      <p><i style=\"font-size:15px;color:#689777\" class=\"fa\" >&#xf046;</i>  60 minutes per session</p>\n" +
        "                                      <br>\n" +
        "                                      <p><i style=\"font-size:15px;color:#689777\" class=\"fa\">&#xf046;</i>  2 days per week</p>\n" +
        "                                      <br>\n" +
        "                                      <p ><i style=\"font-size:15px;color:#689777\" class=\"fa\" >&#xf046;</i><span id=\"basicPrice\"> $24 per hour</span></p>\n" +
        "                                      <br>\n" +
        "\n" +
        "                                    </div>\n" +
        "\n" +
        "\n" +
        "                                    <div class=\"card d-line-block\">\n" +
        "                                      <br>\n" +
        "                                        <i style=\"font-size:36px;color:#689777\" class=\"fa\">\t&#xf072;</i>\n" +
        "                                        <h4 style=\"padding-top: 15px\"><b>Standard</b></h4>\n" +
        "                                        <hr width=\"5%\" style=\"margin:auto;border-color:#689777;\">\n" +
        "                                      <h3 style=\"padding-top: 15px\"id=\"standardTotal\">$254/mo</h3>\n" +
        "\n" +
        "                                      <br>\n" +
        "                                      <p><i style=\"font-size:15px;color:#689777\" class=\"fa\">&#xf046;</i>  60 minutes per session</p>\n" +
        "                                      <br>\n" +
        "                                      <p><i style=\"font-size:15px;color:#689777\" class=\"fa\">&#xf046;</i>  3 days per week</p>\n" +
        "                                      <br>\n" +
        "                                      <p ><i style=\"font-size:15px;color:#689777\" class=\"fa\" >&#xf046;</i><span id=\"standardPrice\">  $21 per hour</span></p>\n" +
        "                                      <br>\n" +
        "\n" +
        "                                    </div>\n" +
        "\n" +
        "\n" +
        "\n" +
        "                                    <div class=\"card d-line-block\">\n" +
        "                                        <br>\n" +
        "                                        <i style=\"font-size:32px;color:#689777\" class=\"fa\">\t&#xf135;</i>\n" +
        "                                        <h4 style=\"padding-top: 15px\"><b>Premium</b></h4>\n" +
        "                                        <hr width=\"5%\" style=\"margin:auto;border-color:#689777;\">\n" +
        "                                      <h3 style=\"padding-top: 15px\"id=\"premiumTotal\">$380/mo</h3>\n" +
        "\n" +
        "                                      <br>\n" +
        "                                      <p><i style=\"font-size:15px;color:#689777\" class=\"fa\">&#xf046;</i>  60 minutes per session</p>\n" +
        "                                      <br>\n" +
        "                                      <p><i style=\"font-size:15px;color:#689777\" class=\"fa\">&#xf046;</i>  5 days per week</p>\n" +
        "                                      <br>\n" +
        "                                        <p><i style=\"font-size:15px;color:#689777\" class=\"fa\" >&#xf046;</i><span id=\"premiumPrice\">  $19 per hour</span></p>\n" +
        "                                      <br>\n" +
        "\n" +
        "                                    </div>\n");
    document.getElementById("paypal_setting").innerHTML=("<form action=\"https://www.paypal.com/cgi-bin/webscr\" method=\"post\" target=\"_top\">\n" +
        "                      <input type=\"hidden\" name=\"cmd\" value=\"_s-xclick\">\n" +
        "                      <input type=\"hidden\" name=\"hosted_button_id\" value=\"Y7D5HU8XHURC4\">\n" +
        "                      <table >\n" +
        "                          <tr><td><input type=\"hidden\" name=\"on0\" value=\"\" ></td></tr><tr ><td ><select name=\"os0\">\n" +
        "                          <option value=\"Basic (tax included)\">Basic (tax included) : $208.65 USD - monthly</option>\n" +
        "                         <option value=\"Standard (tax included)\">Standard (tax included) : $271.78 USD - monthly</option>\n" +
        "                          <option value=\"Premium (tax included)\">Premium (tax included) : $406.60 USD - monthly</option>\n" +
        "                      </select> </td></tr>\n" +
        "                      </table>\n" +
        "                      <input type=\"hidden\" name=\"currency_code\" value=\"USD\">\n" +
        "                      <input type=\"image\" style=\"width:165px;height:46px\" src=\"i/sub.png\" border=\"0\" name=\"submit\" alt=\"PayPal - The safer, easier way to pay online!\">\n" +
        "                      <img alt=\"\" border=\"0\" src=\"https://www.paypalobjects.com/en_US/i/scr/pixel.gif\" width=\"1\" height=\"1\">\n" +
        "                  </form>");
}
function conY(){
    document.getElementById("priceTotalContent").innerHTML=("                                    <div class=\"card d-line-block\">\n" +
        "                                      <br>\n" +
        "                                        <i style=\"font-size:24px;color:#689777\" class=\"fa\">&#xf1d8;</i>\n" +
        "                                        <h4 style=\"padding-top: 15px\"><b>Basic</b></h4>\n" +
        "                                        <hr width=\"5%\" style=\"margin:auto;border-color:#689777;\">\n" +
        "                                      <h3 style=\"padding-top: 15px\" id=\"basicTotal\">$156/mo</h3>\n" +
        "\n" +
        "                                      <br>\n" +
        "                                      <p><i style=\"font-size:15px;color:#689777\" class=\"fa\" >&#xf046;</i>  60 minutes per session</p>\n" +
        "                                      <br>\n" +
        "                                      <p><i style=\"font-size:15px;color:#689777\" class=\"fa\">&#xf046;</i>  2 days per week</p>\n" +
        "                                      <br>\n" +
        "                                      <p ><i style=\"font-size:15px;color:#689777\" class=\"fa\" >&#xf046;</i><span id=\"basicPrice\"> $20 per hour</span></p>\n" +
        "                                      <br>\n" +
        "\n" +
        "                                    </div>\n" +
        "\n" +
        "\n" +
        "                                    <div class=\"card d-line-block\">\n" +
        "                                      <br>\n" +
        "                                        <i style=\"font-size:36px;color:#689777\" class=\"fa\">\t&#xf072;</i>\n" +
        "                                        <h4 style=\"padding-top: 15px\"><b>Standard</b></h4>\n" +
        "                                        <hr width=\"5%\" style=\"margin:auto;border-color:#689777;\">\n" +
        "                                      <h3 style=\"padding-top: 15px\"id=\"standardTotal\">$203/mo</h3>\n" +
        "\n" +
        "                                      <br>\n" +
        "                                      <p><i style=\"font-size:15px;color:#689777\" class=\"fa\">&#xf046;</i>  60 minutes per session</p>\n" +
        "                                      <br>\n" +
        "                                      <p><i style=\"font-size:15px;color:#689777\" class=\"fa\">&#xf046;</i>  3 days per week</p>\n" +
        "                                      <br>\n" +
        "                                      <p ><i style=\"font-size:15px;color:#689777\" class=\"fa\" >&#xf046;</i><span id=\"standardPrice\">  $17 per hour</span></p>\n" +
        "                                      <br>\n" +
        "\n" +
        "                                    </div>\n" +
        "\n" +
        "\n" +
        "\n" +
        "                                    <div class=\"card d-line-block\">\n" +
        "                                        <br>\n" +
        "                                        <i style=\"font-size:32px;color:#689777\" class=\"fa\">\t&#xf135;</i>\n" +
        "                                        <h4 style=\"padding-top: 15px\"><b>Premium</b></h4>\n" +
        "                                        <hr width=\"5%\" style=\"margin:auto;border-color:#689777;\">\n" +
        "                                      <h3 style=\"padding-top: 15px\"id=\"premiumTotal\">$304/mo</h3>\n" +
        "\n" +
        "                                      <br>\n" +
        "                                      <p><i style=\"font-size:15px;color:#689777\" class=\"fa\">&#xf046;</i>  60 minutes per session</p>\n" +
        "                                      <br>\n" +
        "                                      <p><i style=\"font-size:15px;color:#689777\" class=\"fa\">&#xf046;</i>  5 days per week</p>\n" +
        "                                      <br>\n" +
        "                                        <p><i style=\"font-size:15px;color:#689777\" class=\"fa\" >&#xf046;</i><span id=\"premiumPrice\">  $15 per hour</span></p>\n" +
        "                                      <br>\n" +
        "\n" +
        "                                    </div>\n");
    document.getElementById("paypal_setting").innerHTML=("<form action=\"https://www.paypal.com/cgi-bin/webscr\" method=\"post\" target=\"_top\">\n" +
        "<input type=\"hidden\" name=\"cmd\" value=\"_s-xclick\">\n" +
        "<input type=\"hidden\" name=\"hosted_button_id\" value=\"MZ9WKW884A3N6\">\n" +
        "<table>\n" +
        "<tr><td><input type=\"hidden\" name=\"on0\" value=\"\"></td></tr><tr><td><select name=\"os0\">\n" +
        "\t<option value=\"Basic (tax included)\">Basic (tax included) : $2,003.03 USD - yearly</option>\n" +
        "\t<option value=\"Standard (tax included)\">Standard (tax included) : $2,606.52 USD - yearly</option>\n" +
        "\t<option value=\"Premium (tax included)\">Premium (tax included) : $3,903.36 USD - yearly</option>\n" +
        "</select> </td></tr>\n" +
        "</table>\n" +
        "<input type=\"hidden\" name=\"currency_code\" value=\"USD\">\n" +
        "<input type=\"image\" style=\"width:165px;height:46px\" src=\"i/sub.png\" border=\"0\" name=\"submit\" alt=\"PayPal - The safer, easier way to pay online!\">\n" +
        "<img alt=\"\" border=\"0\" src=\"https://www.paypalobjects.com/en_US/i/scr/pixel.gif\" width=\"1\" height=\"1\">\n" +
        "</form>\n")
}

function conS(){
    document.getElementById("priceTotalContent").innerHTML=("\n" +
        "<div class=\"card d-line-block\">\n" +
        "    <br>\n" +
        "    <i style=\"font-size:36px;color:#689777\" class=\"fa\">\t&#xf072;</i>\n" +
        "    <h4 style=\"padding-top: 15px\"><b>Standard</b></h4>\n" +
        "    <hr width=\"5%\" style=\"margin:auto;border-color:#689777;\">\n" +
        "    <h3 style=\"padding-top: 15px\"id=\"standardTotal\">$25</h3>\n" +
        "\n" +
        "    <br>\n" +
        "    <p><i style=\"font-size:15px;color:#689777\" class=\"fa\">&#xf046;</i>  60 minutes per session</p >\n" +
        "    <br>\n" +
        "\n" +
        "</div>\n" +
        "\n" +
        "\n" +
        "\n" +
        "<div class=\"card d-line-block\">\n" +
        "    <br>\n" +
        "    <i style=\"font-size:32px;color:#689777\" class=\"fa\">\t&#xf135;</i>\n" +
        "    <h4 style=\"padding-top: 15px\"><b>Premium</b></h4>\n" +
        "    <hr width=\"5%\" style=\"margin:auto;border-color:#689777;\">\n" +
        "    <h3 style=\"padding-top: 15px\"id=\"premiumTotal\">$50</h3>\n" +
        "\n" +
        "    <br>\n" +
        "    <p><i style=\"font-size:15px;color:#689777\" class=\"fa\">&#xf046;</i>  120 minutes per session</p >\n" +
        "    <br>\n" +
        "\n" +
        "</div>\n" +
        "\n");
    document.getElementById("paypal_setting").innerHTML=("<form action=\"https://www.paypal.com/cgi-bin/webscr\" method=\"post\" target=\"_top\">\n" +
        "<input type=\"hidden\" name=\"cmd\" value=\"_s-xclick\">\n" +
        "<input type=\"hidden\" name=\"hosted_button_id\" value=\"2NFUEENLFJ9YS\">\n" +
        "<table>\n" +
        "<tr><td><input type=\"hidden\" name=\"on0\" value=\"\"></td></tr><tr><td><select name=\"os0\">\n" +
        "\t<option value=\"Basic (tax included)\">Basic (tax included) $26.75 USD</option>\n" +
        "\t<option value=\"Premium (tax included)\">Premium (tax included) $53.50 USD</option>\n" +
        "</select> </td></tr>\n" +
        "</table>\n" +
        "<input type=\"hidden\" name=\"currency_code\" value=\"USD\">\n" +
        "<input type=\"image\" style=\"width:165px;height:46px\" src=\"i/buy.png\" border=\"0\" name=\"submit\" alt=\"PayPal - The safer, easier way to pay online!\">\n" +
        "<img alt=\"\" border=\"0\" src=\"https://www.paypalobjects.com/en_US/i/scr/pixel.gif\" width=\"1\" height=\"1\">\n" +
        "</form>\n")
}
/* */
function aceM(){
    document.getElementById("AbasicTotal").innerHTML=("$265/mo");
    document.getElementById("AstandardTotal").innerHTML=("$345/mo");
    document.getElementById("ApremiumTotal").innerHTML=("$517/mo");
    document.getElementById("AbasicPrice").innerHTML=("&nbsp$33 per hour");
    document.getElementById("AstandardPrice").innerHTML=("&nbsp$29 per hour");
    document.getElementById("ApremiumPrice").innerHTML=("&nbsp$26 per hour");
    document.getElementById("paypal_setting").innerHTML=("<form action=\"https://www.paypal.com/cgi-bin/webscr\" method=\"post\" target=\"_top\">\n" +
        "<input type=\"hidden\" name=\"cmd\" value=\"_s-xclick\">\n" +
        "<input type=\"hidden\" name=\"hosted_button_id\" value=\"DBBHKML7J966L\">\n" +
        "<table>\n" +
        "<tr><td><input type=\"hidden\" name=\"on0\" value=\"\"></td></tr><tr><td><select name=\"os0\">\n" +
        "\t<option value=\"Basic (tax included)\">Basic (tax included) : $283.55 USD - monthly</option>\n" +
        "\t<option value=\"Standard (tax included)\">Standard (tax included) : $369.15 USD - monthly</option>\n" +
        "\t<option value=\"Premium (tax included)\">Premium (tax included) : $553.19 USD - monthly</option>\n" +
        "</select> </td></tr>\n" +
        "</table>\n" +
        "<input type=\"hidden\" name=\"currency_code\" value=\"USD\">\n" +
        "<input type=\"image\" style=\"width:165px;height:46px\" src=\"i/sub.png\" border=\"0\" name=\"submit\" alt=\"PayPal - The safer, easier way to pay online!\">\n" +
        "<img alt=\"\" border=\"0\" src=\"https://www.paypalobjects.com/en_US/i/scr/pixel.gif\" width=\"1\" height=\"1\">\n" +
        "</form>\n")
}
// function aceQ(){
//     document.getElementById("AbasicTotal").innerHTML=("$239/mo");
//     document.getElementById("AstandardTotal").innerHTML=("$310/mo");
//     document.getElementById("ApremiumTotal").innerHTML=("$465/mo");
//     document.getElementById("AbasicPrice").innerHTML=("&nbsp$30 per hour");
//     document.getElementById("AstandardPrice").innerHTML=("&nbsp$26 per hour");
//     document.getElementById("ApremiumPrice").innerHTML=("&nbsp$23 per hour");
//     document.getElementById("paypal_setting").innerHTML=("<form action=\"https://www.paypal.com/cgi-bin/webscr\" method=\"post\" target=\"_top\">\n" +
//         "<input type=\"hidden\" name=\"cmd\" value=\"_s-xclick\">\n" +
//         "<input type=\"hidden\" name=\"hosted_button_id\" value=\"UZWMP9PB7F48Y\">\n" +
//         "<table>\n" +
//         "<tr><td><input type=\"hidden\" name=\"on0\" value=\"\"></td></tr><tr><td><select name=\"os0\">\n" +
//         "\t<option value=\"Basic\">Basic : $239.00 USD - monthly</option>\n" +
//         "\t<option value=\"Standard\">Standard : $310.00 USD - monthly</option>\n" +
//         "\t<option value=\"Premium\">Premium : $465.00 USD - monthly</option>\n" +
//         "</select> </td></tr>\n" +
//         "</table>\n" +
//         "<input type=\"hidden\" name=\"currency_code\" value=\"USD\">\n" +
//         "<input type=\"image\" style=\"width:165px;height:46px\" src=\"i/sub.png\" border=\"0\" name=\"submit\" alt=\"PayPal - The safer, easier way to pay online!\">\n" +
//         "<img alt=\"\" border=\"0\" src=\"https://www.paypalobjects.com/en_US/i/scr/pixel.gif\" width=\"1\" height=\"1\">\n" +
//         "</form>\n")
// }
function aceY(){
    document.getElementById("AbasicTotal").innerHTML=("$212/mo");
    document.getElementById("AstandardTotal").innerHTML=("$276/mo");
    document.getElementById("ApremiumTotal").innerHTML=("$413/mo");
    document.getElementById("AbasicPrice").innerHTML=("&nbsp$26 per hour");
    document.getElementById("AstandardPrice").innerHTML=("&nbsp$23 per hour");
    document.getElementById("ApremiumPrice").innerHTML=("&nbsp$21  per hour");
    document.getElementById("paypal_setting").innerHTML=("<form action=\"https://www.paypal.com/cgi-bin/webscr\" method=\"post\" target=\"_top\">\n" +
        "<input type=\"hidden\" name=\"cmd\" value=\"_s-xclick\">\n" +
        "<input type=\"hidden\" name=\"hosted_button_id\" value=\"WL4JTEAS9N9SU\">\n" +
        "<table>\n" +
        "<tr><td><input type=\"hidden\" name=\"on0\" value=\"\"></td></tr><tr><td><select name=\"os0\">\n" +
        "\t <option value=\"Basic (tax included)\">Basic (tax included) : $2,722.08 USD - yearly</option>\n" +
        "\t<option value=\"Standard (tax included)\">Standard (tax included) : $3,543.84 USD - yearly</option>\n" +
        "\t<option value=\"Premium (tax included)\">Premium (tax included) : $5,302.92 USD - yearly</option>\n" +
        "</select> </td></tr>\n" +
        "</table>\n" +
        "<input type=\"hidden\" name=\"currency_code\" value=\"USD\">\n" +
        "<input type=\"image\" style=\"width:165px;height:46px\" src=\"i/sub.png\" border=\"0\" name=\"submit\" alt=\"PayPal - The safer, easier way to pay online!\">\n" +
        "<img alt=\"\" border=\"0\" src=\"https://www.paypalobjects.com/en_US/i/scr/pixel.gif\" width=\"1\" height=\"1\">\n" +
        "</form>\n")
}