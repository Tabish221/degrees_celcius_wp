function armInitAngularElement(e,t){return"undefined"!=e&&angular.bootstrap(jQuery("#"+e),[t]),!1}function ARMCtrl(n,e,i){n.masterFormData={},n.armPW="",n.arm_form={},n.arm_form_ca={},n.arm_form.user_pass="";n.arm_form;n.armPlanChange=function(r){i(function(){var e=jQuery("#"+r+" .arm_module_plan_input").attr("aria-owns"),t=jQuery("#"+e).find('md-option[selected="selected"]');jQuery("#"+r+' input:radio[name="arm_selected_payment_mode"]').length&&jQuery("#"+r+' input:radio[name="arm_selected_payment_mode"]').filter('[value="auto_debit_subscription"]').prop("checked",!0),armSetupHideShowSections1("#"+r,t),"dropdown"==jQuery("#"+r+' [data-id="arm_front_gateway_skin_type"]').val()&&(e=jQuery("#"+r+" .arm_module_gateway_input").attr("aria-owns"),t=jQuery("#"+e).find("md-option:first").attr("value"),n.payment_gateway=t,n.arm_form.payment_gateway=t,n.armPaymentGatewayChange(r))})},n.armPaymentGatewayChange=function(e){var t=n.payment_gateway,r=(n.arm_form.payment_gateway=t,jQuery("#"+e+' [data-id="arm_total_payable_amount"]').val()),a=jQuery("#"+e+" [name=arm_selected_payment_mode]:checked").val();("0.00"==r||"0"==r)&&"auto_debit_subscription"!=a?jQuery("#"+e+" .arm_module_gateway_fields").slideUp("slow").addClass("arm_hide"):(jQuery("#"+e+" .arm_module_gateway_fields").not(".arm_module_gateway_fields_"+t).slideUp("slow").addClass("arm_hide"),jQuery("#"+e+" .arm_module_gateway_fields_"+t).slideDown("slow").removeClass("arm_hide")),i(function(){jQuery("#"+e+' [data-id="arm_front_plan_skin_type"]').val();armSetupHideShowSections("#"+e)})},n.armPaymentCycleChange=function(e,t){var r=n["payment_cycle_"+e],t=jQuery("#"+t),e=(angular.element("[data-ng-controller=ARMCtrl]").scope(),jQuery('md-option[data-plan_id="'+e+'"][value="'+r+'"]').attr("data-plan_amount")),r=(jQuery(t).find('[data-id="arm_front_plan_skin_type"]').val(),jQuery(t).find("input.arm_module_plan_input:checked"));r.parents(".arm_setup_column_item").find(".arm_module_plan_cycle_price").html(e),r.attr("data-amt",e),armUpdateOrderAmount1(r,t)},n.armSubmitBtnClick=function(e){if(null!=e.isTrigger&&e.isTrigger)return e.preventDefault(),!1},n.armFormSubmit=function(e,t,r){if(e)"radio"==jQuery('[data-id="arm_front_gateway_skin_type"]').val()?jQuery(".arm_module_gateways_container input.arm_module_gateway_input:checked").val():(e=jQuery(".arm_module_gateway_input").attr("aria-owns"),jQuery("#"+e).find("md-option:selected").attr("value")),arm_form_ajax_action(jQuery("#"+t)),jQuery("#"+t).hasClass("arm_form_edit_profile")||(n.arm_form.$setPristine(!0),n.arm_form.$setUntouched());else{if(null!=r.isTrigger&&r.isTrigger)return r.preventDefault(),!1;n.armsetFormErrors(n.arm_form,t)}},n.armSetDefaultPaymentGateway=function(e){n.arm_form.payment_gateway=e},n.isPaymentGatewayField=function(e){return(null==n.arm_form.arm_plan_type||"free"!=n.arm_form.arm_plan_type)&&(n.arm_form.payment_gateway==e&&(e=jQuery('[data-id="arm_total_payable_amount"]').val(),t=jQuery("[name=arm_selected_payment_mode]:checked").val(),"recurring"==jQuery(".arm_module_plan_input:checked").attr("data-type")?"0.00"!=e&&"0"!=e||"auto_debit_subscription"==t:"0.00"!=e&&"0"!=e));var t},n.armisminlengthField=function(e){return n.arm_form.payment_gateway==e?"13":""},n.armSetupFormSubmit=function(e,t,r){if(e){jQuery("#"+t).find('[data-id="arm_front_plan_skin_type"]').val(),"radio"==jQuery("#"+t).find("#arm_front_gateway_skin_type").val()?jQuery("#"+t).find("input.arm_module_gateway_input:checked").val():(e=jQuery("#"+t).find(".arm_module_gateway_input").attr("aria-owns"),jQuery("#"+e).find("md-option:selected").attr("value")),jQuery("#"+t).find(".arm_module_plans_container .arm_module_plan_input:checked").attr("data-type");arm_setup_form_ajax_action(jQuery("#"+t)),n.arm_form.$setPristine(!0),n.arm_form.$setUntouched()}else{if(null!=r.isTrigger&&r.isTrigger)return r.preventDefault(),!1;n.armsetFormErrors(n.arm_form,t)}},n.armsetFormErrors=function(e,t){angular.forEach(e.$error,function(e){angular.forEach(e,function(e){e.$setTouched(),e.$setDirty()})}),t&&0<(e=jQuery("#"+t).find(".ng-invalid")).length&&(e[0].focus(),t=jQuery("#"+e[0].id).offset().top,jQuery(window).scrollTop(t-70))},n.reset=function(e){e&&(e.$setValidity(),e.$setPristine(),e.$setUntouched())},n.resetForm=function(r,e){r&&(jQuery("#"+e).find("[data-ng-model]").each(function(){var e,t;"hidden"!=jQuery(this).attr("type")&&(e=jQuery(this).attr("name"),t=jQuery(this).attr("type"),null!=r[e]&&"object"==jQuery.type(r[e])&&(r[e].$setViewValue(null),r[e].$modelValue="",r[e].$setPristine(),r[e].$setUntouched(),""!=jQuery(this).val()&&jQuery(this).val(""),"file"==t&&jQuery(".armFileRemoveContainer").trigger("click")))}),r.$setPristine(),r.$setUntouched())},n.isSomeSelected=function(t){return!!t&&Object.keys(t).some(function(e){return t[e]})},n.armFormCloseAccountSubmit=function(e,t){e?arm_form_close_account_action(jQuery("#"+t)):n.armsetFormErrors(n.arm_form_ca,t)}}function input(e){return{restrict:"E",require:"?ngModel",link:function(t,r,a,n){r.on("change",function(){var e;"arm_module_plan_input"==a.class&&"hidden"!=a.type&&"dropdown"==jQuery('[data-id="arm_front_gateway_skin_type"]').val()&&(e=jQuery(".arm_module_gateway_input").attr("aria-owns"),e=jQuery("#"+e).find("md-option:first").attr("value"),t.payment_gateway=e,t.armPaymentGatewayChange()),t.$apply(function(){null!=n&&(n.$setViewValue(r.val()),n.$render())})}),a.ngModel&&a.value&&e(a.ngModel).assign(t,a.value)}}}function flnamecheck(e,t,r){return{require:"ngModel",restrict:"C",link:function(e,t,r,a){e.$watch(function(){a.$parsers.unshift(function(e){var t=!/[%`\^&*(){}[\]<>?|]/.test(e);return a.$setValidity("flnamecheck",t),e})})}}}function customvalidationalpha(e,t,r){return{require:"ngModel",restrict:"C",link:function(e,t,r,a){e.$watch(function(){a.$parsers.unshift(function(e){var t=!/[^a-zA-Z._]/.test(e);return a.$setValidity("customvalidationalpha",t),e})})}}}function customvalidationnumber(e,t,r){return{require:"ngModel",restrict:"C",link:function(e,t,r,a){e.$watch(function(){a.$parsers.unshift(function(e){var t=!/[^0-9._]/.test(e);return a.$setValidity("customvalidationnumber",t),e})})}}}function customvalidationalphanumber(e,t,r){return{require:"ngModel",restrict:"C",link:function(e,t,r,a){e.$watch(function(){a.$parsers.unshift(function(e){var t=!/[^a-zA-Z0-9._]/.test(e);return a.$setValidity("customvalidationalphanumber",t),e})})}}}function existcheck(e,l,t){return{require:"ngModel",restrict:"C",link:function(e,n,i,o){n.on("blur",function(e){var t,r=i.name,a=n.val();o&&a&&r&&"arm_form_edit_profile"!=n.parents("form").attr("id")&&(t=jQuery("#"+arm_frm_id).find('input:not([name="ct_bot_detector_event_token"],[name="apbct_visible_fields"],[name="ct_no_cookie_hidden_field"])').last().attr("name"),l.post(__ARMAJAXURL+"?action=arm_check_exist_field&field="+r+"&value="+a,{action:"arm_check_exist_field",field:r,value:a,_wpnonce:t}).then(function(e){"0"==e.data.check?o.$setValidity("existcheck",!1):o.$setValidity("existcheck",!0)}))})}}}function usernamecheck(e,t,r){return{require:"ngModel",restrict:"C",link:function(e,a,n,i){a.on("blur",function(e){n.name;var t=a.val(),r=/^[0-9a-z]+$/i;(r=a.hasClass("arm_multisite_validate")?/^[0-9a-z]+$/:r).test(t)?i.$setValidity("usernamecheck",!0):i.$setValidity("usernamecheck",!1)})}}}function armfileuploader(){return{require:"ngModel",priority:"10",link:function(r,t,e,a){t.on("change",function(){var e=t.val();e.substring(e.lastIndexOf(".")+1).toLowerCase();r.$apply(function(){a.$setViewValue(t.val()),a.$render()})});t.prev().find(".armFileUploaderWrapper")[0].addEventListener("drop",function(e){t.parents(".armFileUploadWrapper").find("input.arm_file_url").on("change",function(e){var t=jQuery(this).val();t.substring(t.lastIndexOf(".")+1).toLowerCase();r.$apply(function(){a.$setViewValue(t),a.$render()})})});var n=e.accept;a.$validators.accept=function(e){if(""!=e&&null!=e){e=e.substring(e.lastIndexOf(".")+1).toLowerCase();if(-1!==["php","php3","php4","php5","pl","py","jsp","asp","exe","cgi"].indexOf(e))return!1;if(null!=n)return-1!==n.replace(/\./g,"").split(",").indexOf(e)}return!0}}}}function checkStrength(){return{priority:"50",replace:!1,link:function(t,r,a){var n={colors:["#F00","#F90","#FF0","#9F0","#0F0"],mesureStrength:function(e){var t=0,r=/[a-z]+/.test(e),a=/[A-Z]+/.test(e),n=/[0-9]+/.test(e),i=/[!,%,&,@,#,$,^,*,?,_,~,-,+]/g.test(e),r=jQuery.grep([r,a,n,i],function(e){return!0===e}).length,t=t+(2*e.length+(8<=e.length?1:0))+10*r;return t=e.length<=5?Math.min(t,10):t,t=1==r?Math.min(t,20):t,t=2==r?Math.min(t,30):t,t=3==r?Math.min(t,40):t,t=(t=(t=(t=4==r?Math.min(t,50):t)<30&&10<=e.length?30:t)<40&&15<=e.length?40:t)<50&&20<=e.length?50:t},getColor:function(e){var t=0;return{idx:(t=e<=10?0:e<=20?1:e<=30?2:e<=40?3:e<=50?4:5)+1,col:this.colors[t]}}};t.$watch(a.checkStrength,function(){var e=t.$eval(a.checkStrength);arm_pwdstrength_vweak=r.parents(".arm_form_input_wrapper").find(".arm_strength_meter_block_container").attr("data-field-veryweak"),arm_pwdstrength_weak=r.parents(".arm_form_input_wrapper").find(".arm_strength_meter_block_container").attr("data-field-weak"),arm_pwdstrength_good=r.parents(".arm_form_input_wrapper").find(".arm_strength_meter_block_container").attr("data-field-good"),arm_pwdstrength_vgood=r.parents(".arm_form_input_wrapper").find(".arm_strength_meter_block_container").attr("data-field-strong"),""===e||null==e?(r.css({display:"inline"}),r.children("li").css({background:"#DDD"}).slice(0,1).css({background:"#F00"}),r.parents(".arm_form_input_wrapper").find(".arm_strength_meter_label").addClass("too_short").html(arm_pwdstrength_vweak)):(e=n.getColor(n.mesureStrength(e)),r.css({display:"inline"}),r.children("li").css({background:"#DDD"}).slice(0,e.idx).css({background:e.col}),e.idx<2?r.parents(".arm_form_input_wrapper").find(".arm_strength_meter_label").addClass("too_short").html(arm_pwdstrength_vweak):2==e.idx?r.parents(".arm_form_input_wrapper").find(".arm_strength_meter_label").addClass("weak").html(arm_pwdstrength_weak):2<e.idx&&e.idx<5?r.parents(".arm_form_input_wrapper").find(".arm_strength_meter_label").addClass("good").html(arm_pwdstrength_good):4<e.idx&&r.parents(".arm_form_input_wrapper").find(".arm_strength_meter_label").addClass("strong").html(arm_pwdstrength_vgood))})},template:'<li class="arm_strength_meter_block" style="background: rgb(255, 0, 0);"></li><li class="arm_strength_meter_block" style="background: rgb(221, 221, 221);"></li><li class="arm_strength_meter_block" style="background: rgb(221, 221, 221);"></li><li class="arm_strength_meter_block" style="background: rgb(221, 221, 221);"></li><li class="arm_strength_meter_block" style="background: rgb(221, 221, 221);"></li>'}}function compare(){return{require:"ngModel",transclude:!0,link:function(e,r,a,t){t.$validators.compare=function(e){var t=r.parents("form").find("."+a.compare).val();return r.val()===t},null!=r.val()&&e.$watch(function(){t.$validate()})}}}function armlowercase(){return{priority:"51",restrict:"A",require:"ngModel",link:function(e,t,r,a){a.$validators.armlowercase=function(e){return/[a-z]/.test(e)}}}}function armuppercase(){return{priority:"52",restrict:"A",require:"ngModel",link:function(e,t,r,a){a.$validators.armuppercase=function(e){return/[A-Z]/.test(e)}}}}function armnumeric(){return{priority:"53",restrict:"A",require:"ngModel",link:function(e,t,r,a){a.$validators.armnumeric=function(e){return/[0-9]/.test(e)}}}}function armspecial(){return{priority:"54",restrict:"A",require:"ngModel",link:function(e,t,r,a){a.$validators.armspecial=function(e){return/[!,%,&,@,#,$,^,*,?,_,~,-,+]/.test(e)}}}}angular.element(document).ready(function(){var e=document;function t(e){e&&r.push(e)}for(var r=[e],a=[],n=[],i=["ng:module","ng-module","x-ng-module","data-ng-module","ng:modules","ng-modules","x-ng-modules","data-ng-modules"],o=/\sng[:\-]module[s](:\s*([\w\d_]+);?)?\s/,l=0;l<i.length;l++){var u=i[l];if(t(document.getElementById(u)),u=u.replace(":","\\:"),e.querySelectorAll){for(var c=e.querySelectorAll("."+u),m=0;m<c.length;m++)t(c[m]);c=e.querySelectorAll("."+u+"\\:");for(m=0;m<c.length;m++)t(c[m]);c=e.querySelectorAll("["+u+"]");for(m=0;m<c.length;m++)t(c[m])}}for(l=0;l<r.length;l++){var s=" "+(e=r[l]).className+" ",s=o.exec(s);if(s)a.push(e),n.push((s[2]||"").replace(/\s+/g,","));else if(e.attributes)for(m=0;m<e.attributes.length;m++){var d=e.attributes[m];-1!=i.indexOf(d.name)&&(a.push(e),n.push(d.value))}}for(l=0;l<a.length;l++){var _=a[l],p=n[l].replace(/ /g,"").split(",");try{angular.bootstrap(_,p)}catch(e){}}});var ARMApp=angular.module("ARMApp",["ngAnimate","ngAria","ngMaterial","ngMessages"]),creditcardModules=["credit-cards"];(jQuery(".cardNumber").length||jQuery(".arm_renew_subscription_button").length)&&angular.forEach(creditcardModules,function(e){ARMApp.requires.push(e)}),ARMCtrl.$inject=["$scope","$http","$timeout"],ARMApp.controller("ARMCtrl",ARMCtrl),input.$inject=["$parse"],ARMApp.directive("input",input),flnamecheck.$inject=["$q","$http","$templateCache"],ARMApp.directive("flnamecheck",flnamecheck),customvalidationalpha.$inject=["$q","$http","$templateCache"],ARMApp.directive("customvalidationalpha",customvalidationalpha),customvalidationnumber.$inject=["$q","$http","$templateCache"],ARMApp.directive("customvalidationnumber",customvalidationnumber),customvalidationalphanumber.$inject=["$q","$http","$templateCache"],ARMApp.directive("customvalidationalphanumber",customvalidationalphanumber),existcheck.$inject=["$q","$http","$templateCache"],ARMApp.directive("existcheck",existcheck),usernamecheck.$inject=["$q","$http","$templateCache"],ARMApp.directive("usernamecheck",usernamecheck),ARMApp.directive("armfileuploader",armfileuploader),ARMApp.directive("checkStrength",checkStrength),ARMApp.directive("compare",compare),ARMApp.directive("armlowercase",armlowercase),ARMApp.directive("armuppercase",armuppercase),ARMApp.directive("armnumeric",armnumeric),ARMApp.directive("armspecial",armspecial),jQuery(document).on("click",function(e){var e=jQuery(e.target),t=jQuery("md-select .md-select-menu-container");t.is(e)||0!==t.has(e).length||t.fadeOut()});