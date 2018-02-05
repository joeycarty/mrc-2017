<!-- Edit this and then copy/paste it into the Contact Form 7 Plugin -->
<fieldset class="side-nav-follow" id="form-client">
  <h1>About Yourself</h1> 
  <div>
    <label for="clientName">Your Name *</label>[text* clientName id:clientName]
  </div>
  <div>
    <label for="clientJob">Job Position *</label>[text* clientJob id:clientJob]
  </div>
  <div>
    <label for="clientEmail">Email *</label>[email* clientEmail id:clientEmail]
  </div>
  <div>
    <label for="clientPhone">Phone *</label>[tel* clientPhone id:clientPhone]
  </div>
  <div>
    <label for="clientCity">City *</label>[text* clientCity id:clienCity]
  </div>
</fieldset>

<fieldset class="side-nav-follow" id="form-company">
  <h1>About Your Company</h1> 
  <div>
    <label for="companyName">Company Name</label>[text companyName id:companyName]
  </div>
  <div>
    <label for="companyIndustry">Industry</label>[text companyIndustry id:companyIndustry]
  </div>
  <div>
    <label for="companyWebsite">Current Website</label>[url companyWebsite id:companyWebsite]
  </div>
  <div>
    <label for="companySize">Size of Company</label>[select companySize first_as_label id:companySize "" "1-10 employees" "11-50 employees" "51-100 employees" "100+ employees"]
  </div>
  <div>
    <label for="companyLocation">Location(s)</label>[text companyLocation id:companyLocation]
  </div>
  <div>
    <label for="companyPurpose">In short, what does your company do?</label>[textarea companyPurpose id:companyPurpose]
  </div>
</fieldset>

<fieldset class="side-nav-follow" id="form-project">
  <h1>About Your Project</h1> 
  <div>
    <label for="projectBudget">Budget Range *</label>[select* projectBudget first_as_label id:projectBudget "" "$3,000 - $5,000" "$5,000 - $15,000" "$15,000 - $25,000" "$25,000 +"]
  </div>
  <div>
    <label for="projectEndDate">Estimated Project Completion Date</label>[text projectEndDate id:projectEndDate]
  </div>
  <div>
    <label for="projectAbout">Tell us all about your project *</label>[textarea* projectAbout id:projectAbout]
  </div>
</fieldset>
<fieldset class="side-nav-follow" id="form-extras">
  <h1>Anything Else?</h1> 
  <div>
    <label for="lead">How'd you find us?</label>[text lead id:lead]
  </div>
  <div>
    <label for="additionalInfo">Anything else we should know?</label>[textarea additionalInfo id:additionalInfo]
  </div>
</fieldset>

<button type="submit"><h1>Submit Inquiry</h1></button>