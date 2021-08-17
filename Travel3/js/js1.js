function ngay(){
					alert("Đã xác nhận ngày đặt vé!!!");	
		}
		document.addEventListener('DOMContentLoaded', function(){
			document.querySelector('#kiemtra').disabled = false;
			document.querySelector('#kiemtra').onclick = function(){
				if ((document.querySelector('#chieudi').value == '' || document.querySelector('#chieudi1').value == '') && 
					(document.querySelector('#chieuve').value == '' || document.querySelector('#chieuve1').value == '')){
			        alert('Bạn chưa nhập chiều đi !');
			    }
			    else{
			    	document.querySelector('#kiemtra').disabled = true;{
						alert("Bạn đã đặt thành công vé!!!");
			}
			    }
			}
			});