
     function printPage(){
            var tableData = '<center><table border="1">'+document.getElementsByTagName('table')[0].innerHTML+'</table></center>';
            var data = tableData+'<center><button onclick="window.print()">Print</button></center>';       
            myWindow=window.open('','','width=800,height=600');
            myWindow.innerWidth = screen.width;
            myWindow.innerHeight = screen.height;
            myWindow.screenX = 0;
            myWindow.screenY = 0;
            myWindow.document.write(data);
            myWindow.focus();
        };
