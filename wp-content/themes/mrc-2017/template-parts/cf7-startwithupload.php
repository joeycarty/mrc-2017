<!-- Edit this and then copy/paste it into the Contact Form 7 Plugin -->
<fieldset id="form-upload">
  <h1>Upload</h1>
  <p>Easily send over a detailed project proposal below.<br>(Acceptable file types include .pdf, .doc, .docx, .pages, .txt)</p> 
  <div>
    [file* file filetypes:pdf|doc|docx|pages|txt id:file]
  </div>
  <div>
    <label for="clientName">Your Name *</label>[text* clientName id:clientName]
  </div>
  <div>
    <label for="clientEmail">Email *</label>[email* clientEmail id:clientEmail]
  </div>
  <div>
    <label for="clientPhone">Phone *</label>[tel* clientPhone id:clientPhone]
  </div>
</fieldset>

<button type="submit"><h1>Submit Inquiry</h1></button>