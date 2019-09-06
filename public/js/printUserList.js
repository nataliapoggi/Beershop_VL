 function printPDF(){
            html2canvas(document.body,
            { 
              onrendered:function(canvas)
              {

                  //create image from web page
                  var img = canvas.toDataURL("image/png");
                  //create pdf object and add image to it, and then save
                  var doc = new jsPDF('p', "mm", "legal");
                  var width = doc.internal.pageSize.getWidth();
                  var hratio = canvas.height/canvas.width;
                  var height = width * hratio;
                  doc.size
                  doc.addImage(img,'JPEG',0,0, width, height);
                  doc.output('save', 'ususarios.pdf');

              }
              })};