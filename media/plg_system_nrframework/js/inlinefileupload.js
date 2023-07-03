var NRInlineFileUploadSelector=function(){function e(){this.url_path="?option=com_ajax&format=raw&plugin=nrframework&path=plugins/system/nrframework/fields/&class=JFormFieldNRInlineFileUpload&file=nrinlinefileupload&task=Include",this.initEvents()}var t=e.prototype;return t.initEvents=function(){document.addEventListener("click",function(e){this.handleOpen(e),this.handleClearUploadedItem(e),this.handleRemoveUploadedItem(e)}.bind(this)),document.addEventListener("change",function(e){this.handleChange(e)}.bind(this))},t.handleOpen=function(e){var t=e.target.closest(".file-selector-opener");t&&(e.preventDefault(),t.nextElementSibling.click())},t.handleClearUploadedItem=function(e){var t=e.target.closest(".nr-inline-file-upload-item-clear");t&&(e.preventDefault(),t.closest(".error").querySelector('input[type="hidden"]').value="",t.closest(".error").classList.remove("visible"),this.showUploadArea(t.closest(".nr-inline-file-upload")))},t.handleRemoveUploadedItem=function(e){var t=e.target.closest(".nr-inline-file-upload-item-remove");if(t&&(e.preventDefault(),confirm(t.dataset.confirm))){var n=this,r=e.target.closest(".nr-inline-file-upload");this.showLoader(r);var i=e.target.closest(".uploaded-files");i.innerHTML="";var o=new FormData;o.append("remove_file",t.nextElementSibling.value),o.append(Joomla.getOptions("csrf.token"),1),fetch(r.dataset.baseUrl+this.url_path+"&action=remove",{method:"post",body:o}).then(function(e){return e.json()}).then(function(e){e.error?(n.showUploadArea(r),n.showError(r,e.response)):(n.hideError(r),i.previousElementSibling.classList.remove("hidden")),n.hideLoader(r)})}},t.handleChange=function(e){var t=e.target.closest(".file-selector");if(t){var n=this,r=t.closest(".nr-inline-file-upload");this.hideError(r),this.hideUploadArea(r),this.hideSelectedFile(r),this.showLoader(r);var i=new FormData;i.append("file",t.files[0]),i.append("upload_folder",r.dataset.uploadFolder),i.append(Joomla.getOptions("csrf.token"),1),fetch(r.dataset.baseUrl+this.url_path,{method:"post",body:i}).then(function(e){return e.json()}).then(function(e){e.error?(n.showUploadArea(r),n.showError(r,e.response)):(n.hideError(r),n.replaceSelectedFile(r,e)),n.hideLoader(r),t.value=""})}},t.hideSelectedFile=function(e){e.querySelector(".uploaded-files").innerHTML=""},t.replaceSelectedFile=function(e,t){e.querySelector(".uploaded-files").innerHTML="";var n=document.querySelector("template.nr-inline-file-upload-item").content.cloneNode(!0);n.querySelector(".file-name").innerHTML=atob(t.file_name),n.querySelector(".size").innerHTML=t.file_size;var r=document.createElement("div");r.classList.add("nr-inline-file-upload-item"),r.append(n);var i=document.createElement("input");i.setAttribute("type","hidden"),i.setAttribute("name",e.dataset.name),i.setAttribute("value",atob(t.file)),r.appendChild(i),e.querySelector(".uploaded-files").append(r),this.hideUploadArea(e)},t.showError=function(e,t){e.querySelector(".error").innerHTML=t,e.querySelector(".error").classList.add("visible")},t.hideError=function(e){e.querySelector(".error").innerHTML="",e.querySelector(".error").classList.remove("visible")},t.showLoader=function(e){e.classList.add("loading")},t.hideLoader=function(e){e.classList.remove("loading")},t.hideUploadArea=function(e){e.querySelector(".upload-area").classList.add("hidden")},t.showUploadArea=function(e){e.querySelector(".upload-area").classList.remove("hidden")},e}();document.addEventListener("DOMContentLoaded",function(){new NRInlineFileUploadSelector});

