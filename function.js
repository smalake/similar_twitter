function delete_button(id){
    password = window.prompt("削除用パスワードを入力してください。","");
    if(password == null){
        window.alert("キャンセルされました。");
    }
    else{
        $.ajax({
            type: "POST",
            url: "delete.php",
            data: {id: id, password: password},
        }).done((data) => {
            if(data == "OK"){
                alert("削除しました。");
                location.href="index.php";
            }
            else{
                alert(data);
            }
        }).fail((data) => {
            alert("通信に失敗しました。");
        })
    }
}