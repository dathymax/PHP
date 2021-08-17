document.addEventListener('DOMContentLoaded',function(){
            document.querySelector('#check').onclick=function(){
                if( document.querySelector('#name').value.length==0){
                    alert("Vui lòng nhập họ tên của bạn")
                }
                else if( document.querySelector('#username').value.length < 8 || document.querySelector('#username').value.length > 13){
                    alert("Vui lòng nhập tên đăng nhập từ 8-13 ký tự")
                }
                else if( document.querySelector('#password').value.length==0){
                    alert("Vui lòng nhập mật khẩu")
                }
                else if( document.querySelector('#password').value.length < 8){
                    alert("Mật khẩu phải từ 8 ký tự trở lên")
                }
                else if( document.querySelector('#password').value != document.querySelector('#passcheck').value){
                    alert("Mật khẩu không khớp")
                }               
                else if( document.querySelector('#email').value.length==0){
                    alert("Vui lòng nhập Email")
                }
                else if( document.querySelector('#SDT').value.length==0){
                    alert("Vui lòng nhập số điện thoại")
                }                
                else if( document.querySelector('#tl').value.length==0){
                    alert("Hãy trả lời câu hỏi của bạn")
                }
                else {
                    document.querySelector('#submit').disabled = false;
                }
            };
        });