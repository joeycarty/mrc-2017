<!-- Edit this and then copy/paste it into the Contact Form 7 Plugin -->
<fieldset id="form-apply">
  <div>
    <label for="applicantName">Your Name *</label>[text* applicantName id:applicantName]
  </div>
  <div>
    <label for="applicantEmail">Email *</label>[email* applicantEmail id:applicantEmail]
  </div>
  <div>
    <label for="applicantPhone">Phone *</label>[tel* applicantPhone id:applicantPhone]
  </div>
  <div>
    <label for="applicantDesiredJob">Applying For... *</label>[text* applicantDesiredJob id:applicantDesiredJob]
  </div>

  <p class="label">Upload Resume (PDF) *</p>
  <div>
    [file* file filetypes:pdf|doc|docx|pages|txt id:file]
  </div>
  <div>
    <label for="applicantPortfolio">Portfolio URL</label>[url applicantPortfolio id:applicantPortfolio]
  </div>
  <div>
    <label for="applicantWeirdFact">Weird Fact About You</label>[textarea applicantWeirdFact id:applicantWeirdFact]
  </div>
</fieldset>

<button type="submit"><h1>Submit Application</h1></button>