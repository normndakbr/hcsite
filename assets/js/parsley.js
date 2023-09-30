$.extend(window.Parsley.options, {
  focus: "first",
  excluded:
    "input[type=button], input[type=submit], input[type=reset], .search, .ignore",
  triggerAfterFailure: "change blur",
  errorsContainer: function (element) {},
  trigger: "change",
  successClass: "is-valid",
  errorClass: "is-invalid",
  classHandler: function (el) {
    return el.$element.closest(".form-group");
  },
  errorsContainer: function (el) {
    return el.$element.closest(".form-group");
  },
  errorsWrapper: '<div class="parsley-error"></div>',
  errorTemplate: "<span></span>",
});

Parsley.on("field:validated", function (el) {
  var elNode = $(el)[0];
  if (elNode && !elNode.isValid()) {
    var requiredValResult = elNode.validationResult.filter(function (vr) {
      return vr.assert.name === "required";
    });
    if (requiredValResult.length > 0) {
      var fieldNode = $(elNode.element);
      var formGroupNode = fieldNode.closest(".form-group");
      var lblNode = formGroupNode.find(".form-label:first");
      if (lblNode.length > 0) {
        // Get the element's tag name
        var tagName = fieldNode.prop("tagName").toLowerCase();

        // Determine the error message based on the tag name
        var errorMessage;
        if (tagName === "input") {
          errorMessage = lblNode.text() + " masih kosong.";
        } else if (tagName === "select") {
          errorMessage = lblNode.text() + " belum dipilih.";
        } else {
          errorMessage = lblNode.text() + " belum dipilih.";
        }

        // Change the error message
        var errorNode = formGroupNode.find("div.parsley-error span[class*=parsley-]");
        if (errorNode.length > 0 && errorMessage) {
          errorNode.html(errorMessage);
        }
      }
    }
  }
});


Parsley.addValidator("16Character", {
  requirementType: "integer",
  validateString: function (value) {
    // Check if the value contains only letters and has a length between 16 and 16 characters
    return value.length === 16;
  },
  messages: {
    en: "No. KTP minimal 16 karakter",
    id: "No. KTP minimal 16 karakter",
  },
});
