var url = "http://localhost/taslak/panel/index.php";

function hesapekle(){
    var deger = $("#hesapekleformu").serialize();
    $.ajax({
        type : "POST",
        url  : url+"/inc/hesapekle.php",
        data : deger,
        success : function (sonuc) {
            if($.trim(sonuc) == "bos"){
                swal("Hata","Lütfen tüm alanları doldurun","error");
            }else if($.trim(sonuc) == "format"){
                swal("Hata","Para Birimi Seçmediniz","error");
            }else if($.trim(sonuc) == "hata"){
                swal("Hata","Hesap Seçmediniz","error");
            }else if($.trim(sonuc) == "basarili"){
                swal("Başarılı","Hesabınıza Başarıyla Eklenmiştir.","success");
                $("select[name=birim]").val( '');
                $("input[name=hesaplar]").val('');
                $("input[name=para]").val('');
            }

        }

    });
}

function eyazigonder(){
    var deger = $("#editorformu").serialize();
    $.ajax({
        type : "POST",
        url  : url+"/inc/yazigonder.php",
        data : deger,
        success : function (sonuc) {
            if($.trim(sonuc) == "bos"){
                swal("Hata","Lütfen tüm alanları doldurun","error");
            }else if($.trim(sonuc) == "format"){
                swal("Hata","E-posta formatı yanlış","error");
            }else if($.trim(sonuc) == "hata"){
                swal("Hata","Sistem hatası oluştu","error");
            }else if($.trim(sonuc) == "basarili"){
                swal("Başarılı","Mesajınız alınmıştır.En kısa sürede dönüş sağlanacaktır","success");
                $("input[name=baslik]").val( '');
                $("input[name=kategori]").val('');
                $("input[name=resim]").val('');
                $("textarea[name=icerik]").val('');
                $("input[name=etiketler]").val('');

            }

        }

    });
}

function yorumyap(){

    var deger = $("#yorumformu").serialize();
    $.ajax({
        type : "POST",
        url  : url+"/inc/yorumyap.php",
        data : deger,
        success : function (sonuc) {
            if($.trim(sonuc) == "bos"){
                swal("Hata","Lütfen tüm alanları doldurun","error");
            }else if($.trim(sonuc) == "format"){
                swal("Hata","E-posta formatı yanlış","error");
            }else if($.trim(sonuc) == "hata"){
                swal("Hata","Sistem hatası oluştu","error");
            }else if($.trim(sonuc) == "basarili"){
                swal("Başarılı","Yorumunuz gönderilmiştir.Yönetici tarafından onaylandığında yansıtılacaktır.","success");
                $("input[name=adsoyad]").val( '');
                $("input[name=eposta]").val('');
                $("input[name=website]").val('');
                $("textarea[name=yorum]").val('');
            }
        }
    });

}

function aboneol(){

    var deger = $("#aboneformu").serialize();
    $.ajax({
        type : "POST",
        url  : url+"/inc/aboneol.php",
        data : deger,
        success : function (sonuc) {
            if($.trim(sonuc) == "bos"){
                swal("Hata","Lütfen tüm alanları doldurun","error");
            }else if($.trim(sonuc) == "format"){
                swal("Hata","E-posta formatı yanlış","error");
            }else if($.trim(sonuc) == "hata"){
                swal("Hata","Sistem hatası oluştu","error");
            }else if($.trim(sonuc) == "basarili"){
                swal("Başarılı","Abonemiz olduğunuz için teşekkürler.","success");
                $("input[name=aboneeposta]").val('');
            }else if($.trim(sonuc) == "var"){
                swal("Hata","Zaten abonemizsiniz...","error");
            }
        }
    });

}