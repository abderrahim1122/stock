<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      gérer
      <small>L'entreprise</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Accueil</a></li>
      <li class="active">L'entreprise</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-md-12 col-xs-12">

        <?php if ($this->session->flashdata('success')) : ?>
          <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?php echo $this->session->flashdata('success'); ?>
          </div>
        <?php elseif ($this->session->flashdata('error')) : ?>
          <div class="alert alert-error alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?php echo $this->session->flashdata('error'); ?>
          </div>
        <?php endif; ?>

        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Gérer les informations de l'entreprise</h3>
          </div>
          <form role="form" action="<?php base_url('company/update') ?>" method="post">
            <div class="box-body">

              <?php echo validation_errors(); ?>

              <div class="form-group">
                <label for="company_name">Nom de l'entreprise</label>
                <input type="text" class="form-control" id="company_name" name="company_name" placeholder="Enter company name" value="<?php echo $company_data['company_name'] ?>" autocomplete="off">
              </div>
              <div class="form-group">
                <label for="service_charge_value">Montant des frais (%)</label>
                <input type="text" class="form-control" id="service_charge_value" name="service_charge_value" placeholder="Enter charge amount %" value="<?php echo $company_data['service_charge_value'] ?>" autocomplete="off">
              </div>
              <div class="form-group">
                <label for="vat_charge_value">Frais de TVA (%)</label>
                <input type="text" class="form-control" id="vat_charge_value" name="vat_charge_value" placeholder="Enter vat charge %" value="<?php echo $company_data['vat_charge_value'] ?>" autocomplete="off">
              </div>
              <div class="form-group">
                <label for="address">Adresse</label>
                <input type="text" class="form-control" id="address" name="address" placeholder="Enter address" value="<?php echo $company_data['address'] ?>" autocomplete="off">
              </div>
              <div class="form-group">
                <label for="phone">Téléphone</label>
                <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter phone" value="<?php echo $company_data['phone'] ?>" autocomplete="off">
              </div>
              <div class="form-group">
                <label for="country">Pays</label>
                <input type="text" class="form-control" id="country" name="country" placeholder="Enter country" value="<?php echo $company_data['country'] ?>" autocomplete="off">
              </div>
              <div class="form-group">
                <label for="permission">Message</label>
                <textarea class="form-control" id="message" name="message">
                     <?php echo $company_data['message'] ?>
                  </textarea>
              </div>
              <div class="form-group">
                <label for="currency">Devise</label>
                <?php ?>
                <select class="form-control" id="currency" name="currency">
                  <option value="">~~SELECTIONNER~~</option>

                  <?php foreach ($currency_symbols as $k => $v) : ?>
                    <option value="<?php echo trim($k); ?>" <?php if ($company_data['currency'] == $k) {
                                                              echo "selected";
                                                            } ?>><?php echo $k ?></option>
                  <?php endforeach ?>
                </select>
              </div>

            </div>
            <!-- /.box-body -->

            <div class="box-footer">
              <button type="submit" class="btn btn-primary">Sauvegarder les modifications</button>
            </div>
          </form>
        </div>
        <!-- /.box -->
      </div>
      <!-- col-md-12 -->
    </div>
    <!-- /.row -->


  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<script type="text/javascript">
  $(document).ready(function() {
    $("#companyNav").addClass('active');
    $("#message").wysihtml5();
  });



, 
    
    $((function() {
      var t = null,
        e = !1,
        n = function updateActiveCategory(t) {
          $("[data-filter-active-category]").html(t)
        },
        r = function checkEmptyWrapperTable(t) {
          var e = $("[data-filter-table-wrapper]");
          e.length && (t ? e.removeClass("hidden") : e.each((function() {
            $(this).find("[data-filter-table-category-id]").length === $(this).find(".hidden").length && $(this).addClass("hidden")
          })))
        },
        o = function filterServices(e, n) {
          $.extend($.expr[":"], {
            containsi: function containsi(n) {
              var r = n.innerHTML.match(/data\x2Dfilter\x2Dtable\x2Dservice\x2Dname="true"(?:(?!>)[\s\S])*>([\s\S]*?)<\/td>/i),
                o = n.innerHTML.match(/data\x2Dfilter\x2Dtable\x2Dservice\x2Did="([0-9]+)"[\s\S]*?/i),
                i = $(n).data("filter-table-category-id"),
                a = t && parseInt(i, 10) === parseInt(t, 10),
                s = r && r[1] && -1 !== r[1].toLowerCase().indexOf(e.toLowerCase()),
                l = o && o[1] && -1 !== o[1].toLowerCase().indexOf(e.toLowerCase());
              return !(null !== t && !a || !s && !l)
            }
          }), r("clear"), $("".concat(n, " [data-filter-table-category-id]")).not(":containsi('".concat(e.toLowerCase(), "')")).each((function() {
            $(this).addClass("hidden")
          })), $("".concat(n, " [data-filter-table-category-id]:containsi('").concat(e.toLowerCase(), "')")).each((function(t) {
            $(this).removeClass("hidden")
          })), e || null === t && $("[data-filter-table-category-id]").each((function(t) {
            $(this).removeClass("hidden")
          })), r()
        };
      $("[data-filter-category-id]").on("click", (function(i) {
        i.preventDefault();
        var a = $(this).data("filter-category-id"),
          s = $(this).data("filter-category-name"),
          l = $("[data-search-service]").data().searchService;
        void 0 !== a && ("All" === a ? (t = null, n(""), $("[data-filter-table-category-id]").removeClass("hidden"), r("clear"), e && o(e, l)) : ($("[data-filter-table-category-id]").addClass("hidden"), $('[data-filter-table-category-id="'.concat(a, '"]')).removeClass("hidden"), t = "".concat(a), n(s), r("clear"), e ? (r("clear"), o(e, l)) : r()))
      })), $("[data-search-service]").keyup((function() {
        var t = $(this).data("search-service"),
          n = "".concat(t, " tr"),
          r = $(this).val().toLowerCase();
        $(n).length > 1500 || (e = r, o(r, t))
      })), $(document).on("keypress", (function(t) {
        if (13 === t.which) {
          var e = $("[data-search-service]");
          if (e.is(":focus")) {
            var n = e.val(),
              r = e.data("search-service");
            o(n, r)
          }
        }
      })), $("[data-filter-serch-btn]").on("click", (function() {
        var t = $("[data-search-service]"),
          e = t.val(),
          n = t.data("search-service");
        o(e, n)
      }))
    })), 21 !== t.theme_id && 22 !== t.theme_id && 23 !== t.theme_id || $(".dropdown").on("show.bs.dropdown", (function() {
      if ($(".wrapper-content__body").length) {
        var t = $(".wrapper-content__body").offset(),
          e = $(".wrapper-content__body").height(),
          n = $(this).offset(),
          r = $(this).height(),
          o = $(this).find(".dropdown-menu"),
          i = e + t.top - (n.top + r) - 5;
        o.css({
          overflow: "auto",
          "max-height": "".concat(i < 300 ? i : 300, "px")
        })
      }
    })),
    function(t, e) {
      var n = t();
      t.fn.dropdownHover = function(r) {
        return "ontouchstart" in document ? this : (n = n.add(this.parent()), this.each((function() {
          var n, o, i = t(this),
            a = i.parent(),
            s = a.children(".dropdown-menu"),
            l = {
              delay: t(this).data("delay"),
              hoverDelay: t(this).data("hover-delay"),
              instantlyCloseOthers: t(this).data("close-others")
            },
            c = t.extend(!0, {}, {
              delay: 300,
              hoverDelay: 0,
              instantlyCloseOthers: !0
            }, r, l);

          function openDropdown() {
            i.parents(".navbar").find(".navbar-toggle").is(":visible") || (e.clearTimeout(n), e.clearTimeout(o), o = e.setTimeout((function() {
              e.clearTimeout(o), i.attr("aria-expanded", "true"), a.addClass("show"), s.addClass("show"), i.trigger("show.bs.dropdown")
            }), c.hoverDelay))
          }
          a.hover((function(t) {
            openDropdown()
          }), (function() {
            e.clearTimeout(o), n = e.setTimeout((function() {
              i.attr("aria-expanded", "false"), a.removeClass("show"), s.removeClass("show"), i.trigger("hide.bs.dropdown")
            }), c.delay)
          })), i.hover((function(t) {
            if (!a.hasClass("show") && !a.is(t.target)) return !0;
            openDropdown()
          })), a.find(".dropdown-submenu").each((function() {
            var n, r = t(this);
            r.hover((function() {
              e.clearTimeout(n), s.addClass("show"), r.siblings().children(".dropdown-menu").removeClass("show")
            }), (function() {
              var t = r.children(".dropdown-menu");
              n = e.setTimeout((function() {
                t.hide()
              }), c.delay)
            }))
          }))
        })))
      }, t((function() {
        t('[data-hover="dropdown"]').dropdownHover()
      }))
    }(jQuery, window)
  }
  }
  },
  function(t, e, n) {
    function _typeof(t) {
      return (_typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function(t) {
        return typeof t
      } : function(t) {
        return t && "function" == typeof Symbol && t.constructor === Symbol && t !== Symbol.prototype ? "symbol" : typeof t
      })(t)
    }
    var r = n(320);
    customModule.siteAddfunds = {
      fieldsOptions: void 0,
      amountOptions: void 0,
      amountCurrencyOptions: void 0,
      fieldsContainer: void 0,
      run: function run(t) {
        var e = this;
        e.fieldsContainer = $("form"), e.fieldOptions = t.fieldOptions, e.amountOptions = t.amountOptions, e.amountCurrencyOptions = t.amountCurrencyOptions, e.params = t;
        try {
          $('[data-toggle="tooltip"]').tooltip()
        } catch (t) {
          console.log("Error with tooltip. Catch", t)
        }
        e.updateAmountLabel(), $(document).on("change", "#method", (function(t) {
          t.preventDefault();
          var n = $(this).val();
          e.updateFields(n), e.updateAmount(n), e.updateAmountCurrency(n)
        })), void 0 !== t.options && (void 0 !== t.options.stripe && e.initStripe(t.options.stripe), void 0 !== t.options.bluesnap && e.initBlueSnap(t.options.bluesnap), void 0 !== t.options.razorpay && e.initRazorpay(t.options.razorpay), void 0 !== t.options.stripe3ds && e.initStripe3ds(t.options.stripe3ds), void 0 !== t.options.stripePay && e.initStripePay(t.options.stripePay), void 0 !== t.options.stripeAlipay && e.initStripeAlipay(t.options.stripeAlipay), void 0 !== t.options.stripeWeChatPay && e.initStripeWeChatPay(t.options.stripeWeChatPay), void 0 !== t.options.midtrans && e.initMidtrans(t.options.midtrans), void 0 !== t.options.paywithpaytm && e.initPaytm(t.options.paywithpaytm), void 0 !== t.options.paytmimap && e.initPaytm(t.options.paytmimap), void 0 !== t.options.klikbca && e.initKlikbca(t.options.klikbca), void 0 !== t.options.kasikornbank && e.initKlikbca(t.options.kasikornbank), void 0 !== t.options.authorize && e.initAuthorize(t.options.authorize), void 0 !== t.options.buypayer && e.initBuypayer(t.options.buypayer), void 0 !== t.options.qiwi && e.initQiwi(t.options.qiwi), void 0 !== t.options.payoneer && e.initTransactionImap(t.options.payoneer), void 0 !== t.options.mastercard && e.initMastercard(t.options.mastercard), void 0 !== t.options.mastercardEu && e.initMastercard(t.options.mastercardEu), void 0 !== t.options.squareup && e.initSquareup(t.options.squareup), void 0 !== t.options.checkout_com && e.initCheckoutCom(t.options.checkout_com), void 0 !== t.options.checkout_com_2 && e.initCheckoutCom(t.options.checkout_com_2), void 0 !== t.options.checkout_com_3ds && e.initCheckoutCom3Ds(t.options.checkout_com_3ds), void 0 !== t.options.manual_77 && e.initManual(t.options.manual_77), void 0 !== t.options.manual_243 && e.initManual(t.options.manual_243), void 0 !== t.options.manual_244 && e.initManual(t.options.manual_244), void 0 !== t.options.manual_245 && e.initManual(t.options.manual_245), void 0 !== t.options.manual_246 && e.initManual(t.options.manual_246), void 0 !== t.options.omise && e.initOmise(t.options.omise), void 0 !== t.options.paymes && e.initCard(t.options.paymes), void 0 !== t.options.stripeCheckout && e.initStripeCheckout(t.options.stripeCheckout), void 0 !== t.options.cryptochill && e.initCryptochill(t.options.cryptochill), void 0 !== t.options.pay2pay && e.initCard(t.options.pay2pay), void 0 !== t.options.phonepe && e.initPhonePe(t.options.phonepe), void 0 !== t.options.phonepeimap && e.initTransactionImap(t.options.phonepeimap), void 0 !== t.options.gbPrimePay && e.initQrModal(t.options.gbPrimePay), void 0 !== t.options.ksherBblPromptpay && e.initQrModal(t.options.ksherBblPromptpay), void 0 !== t.options.payiyo && e.initQrModal(t.options.payiyo), void 0 !== t.options.gbPrimePay3ds && e.initGbPrimePay3ds(t.options.gbPrimePay3ds), void 0 !== t.options.adyen && e.initAdyen(t.options.adyen), void 0 !== t.options.shopinext && e.initShopinext(t.options.shopinext), void 0 !== t.options.openmoney && e.initOpenMoney(t.options.openmoney), void 0 !== t.options.wechatpaynative && e.initWeChatPayNative(t.options.wechatpaynative), void 0 !== t.options.paghiper && e.initPaghiper(t.options.paghiper), void 0 !== t.options.sumup && e.initSumup(t.options.sumup), void 0 !== t.options.stcpay && e.initStcPay(t.options.stcpay), void 0 !== t.options.geidea && e.initGeidea(t.options.geidea), void 0 !== t.options.paymobkiosk && e.initPaymobKiosk(t.options.paymobkiosk), void 0 !== t.options.paysky && e.initPaysky(t.options.paysky), void 0 !== t.options.youcanpay && e.initYoucanpay(t.options.youcanpay), void 0 !== t.options.cloudpayments && e.initCloudpayments(t.options.cloudpayments)), $("#method").trigger("change")
      },
      copyFieldValue: function copyFieldValue(t) {
        var e = document.getElementById(t);
        e.select(), e.setSelectionRange(0, 99999), document.execCommand("copy")
      },
      updateFields: function updateFields(t) {
        var e = this.params.options;
        if ($("button[type=submit]", this.fieldsContainer).show(), $("#amount", this.fieldsContainer).parents(".form-group").show(), $(".fields", this.fieldsContainer).remove(), $("input,select", this.fieldsContainer).prop("disabled", !1), void 0 !== this.fieldOptions && void 0 !== this.fieldOptions[t] && this.fieldOptions[t]) {
          var r = [],
            o = n(61),
            i = n(321),
            a = n(322),
            s = n(323);
          $.each(this.fieldOptions[t], (function(t, e) {
            void 0 !== e && null != e && e && ("input" == e.type && r.push(o(e)), "hidden" == e.type && r.push(i(e)), "checkbox" == e.type && r.push(a(e)), "select" == e.type && r.push(s(e)))
          })), e.stripeIndia && (e.stripeIndia.type == t ? this.initStripeIndia(e.stripeIndia) : this.closeStripeIndia()), $(".form-group", this.fieldsContainer).last().after(r.join("\r\n")), e.stripeSepa && (e.stripeSepa.type == t ? this.initStripeSepa(e.stripeSepa) : this.closeStripeSepa())
        }
      },
      updateAmount: function updateAmount(t) {
        var e = $("#amount"),
          n = e.val();
        if ($("#amountSelect").remove(), e.length && (e.attr("step", "0.01"), e.removeClass("hidden"), void 0 !== this.amountOptions && void 0 !== this.amountOptions[t] && this.amountOptions[t])) {
          var r, o = $("<select></select>").attr("id", "amountSelect").attr("class", e.attr("class")).attr("name", e.attr("name"));
          e.after(o), e.addClass("hidden"), $.each(this.amountOptions[t], (function(t, e) {
            r = $("<option></option>").attr("value", t).text(e), n == e.id && r.attr("selected", "selected"), o.append(r)
          }))
        }
      },
      updateAmountLabel: function updateAmountLabel() {
        var t = $("#amount_label_currency");
        if (!t.length) {
          var e = $('label[for="amount"]', $("#amount").parents("form"));
          if (e.length) {
            var n = $("<span/>", {
              id: "amount_label"
            }).text(e.text());
            t = $("<span/>", {
              id: "amount_label_currency"
            }), e.html("").append(n, " ", t)
          }
        }
      },
      updateAmountCurrency: function updateAmountCurrency(t) {
        var e = $("#amount_label_currency");
        t && e.length && (void 0 !== this.amountCurrencyOptions && void 0 !== this.amountCurrencyOptions[t] && this.amountCurrencyOptions[t] ? e.text("(" + this.amountCurrencyOptions[t] + ")").removeClass("hidden") : e.text("").addClass("hidden"))
      },
      initWeChatPayNative: function initWeChatPayNative(t) {
        var e = this,
          o = function hideError() {
            $(".alert.alert-danger", e.fieldsContainer).remove()
          };
        $("button", e.fieldsContainer).on("click", (function() {
          var i = $("#method").val();
          if (t.type != i) return !0;
          var a = n(324);
          $("body").append(a({
            close_title: t.modal.close_title
          }));
          var s = $("#qr-modal"),
            l = e.fieldsContainer.serializeArray();
          return l.push({
            name: "save",
            value: 1
          }), $.ajax({
            url: e.fieldsContainer.attr("action"),
            data: $.param(l),
            async: !1,
            method: "POST",
            success: function success(n) {
              if ($("#qr-modal-spinner").hide(), "success" == n.status) {
                s.modal("show"), s.on("hide.bs.modal", (function() {
                  $("#qr-modal").remove(), window.location.reload()
                }));
                var i = $("#qr-code-container");
                !0, o(), new QRCode(i.get(0), n.data.code_url)
              } else "error" == n.status && function showError(t) {
                o(), t && t.length && e.fieldsContainer.prepend(r({
                  text: t
                }))
              }(n.error && n.error.length ? n.error : t.defaultErrorText)
            }
          }), !1
        }))
      },
      initPaghiper: function initPaghiper(t) {
        var e = this,
          o = function hideError() {
            $(".alert.alert-danger", e.fieldsContainer).remove()
          };
        $("button", e.fieldsContainer).on("click", (function(i) {
          var a = $("#method").val();
          if (t.type != a) return !0;
          var s = n(325);
          $("body").append(s({
            close_title: t.modal.close_title,
            instruction: t.modal.instruction
          }));
          var l = $("#qr-modal"),
            c = e.fieldsContainer.serializeArray();
          return c.push({
            name: "save",
            value: 1
          }), $.ajax({
            url: e.fieldsContainer.attr("action"),
            data: $.param(c),
            async: !1,
            method: "POST",
            success: function success(n) {
              if ($("#qr-modal-spinner").hide(), "success" == n.status) {
                l.modal("show"), l.on("hide.bs.modal", (function() {
                  $("#qr-modal").remove(), window.location.reload()
                }));
                var i = $("#qr-code-image"),
                  a = $("#qr-code-value");
                $("#qr-code-copy-button").on("click", (function() {
                  e.copyFieldValue("qr-code-value")
                })), a.val(n.data.emv), i.prop({
                  src: n.data.qrcode_image_url
                }), i.prop({
                  alt: n.data.emv
                }), !0, o()
              } else "error" == n.status && function showError(t) {
                o(), t && t.length && e.fieldsContainer.prepend(r({
                  text: t
                }))
              }(n.error && n.error.length ? n.error : t.defaultErrorText)
            }
          }), !1
        }))
      },
      initSumup: function initSumup(t) {
        var e = this,
          o = function hideError() {
            $(".alert.alert-danger", e.fieldsContainer).remove()
          };
        $("button", e.fieldsContainer).on("click", (function() {
          var i = $("#method").val();
          if (t.type != i) return !0;
          var a = n(326);
          $("body").append(a({
            modal_title: t.modal.title,
            modal_close: t.modal.close_title
          }));
          var s = $("#sumupCardModal"),
            l = e.fieldsContainer.serializeArray();
          return l.push({
            name: "save",
            value: 1
          }), $.ajax({
            url: e.fieldsContainer.attr("action"),
            data: $.param(l),
            async: !1,
            method: "POST",
            success: function success(n) {
              $("#qr-modal-spinner").hide(), "success" == n.status ? (s.modal("show"), s.on("hide.bs.modal", (function() {
                $("#sumupCardModal").remove(), window.location.reload()
              })), SumUpCard.mount({
                checkoutId: n.data.checkoutId,
                onResponse: function onResponse() {
                  window.location.reload()
                }
              }), !0, o()) : "error" == n.status && function showError(t) {
                o(), t && t.length && e.fieldsContainer.prepend(r({
                  text: t
                }))
              }(n.error && n.error.length ? n.error : t.defaultErrorText)
            }
          }), !1
        }))
      },
      initStcPay: function initStcPay(t) {
        var e = this,
          o = function hideError() {
            $(".alert.alert-danger", e.fieldsContainer).remove()
          },
          i = function showError(t) {
            o(), t && t.length && e.fieldsContainer.prepend(r({
              text: t
            }))
          };
        $("button", e.fieldsContainer).on("click", (function(a) {
          if (t.type != $("#method").val()) return !0;
          var s = n(327);
          $("body").append(s({
            close_title: t.modal.close_title,
            submit_title: t.modal.submit_title,
            cancel_title: t.modal.cancel_title,
            modal_title: t.modal.title,
            otp_title: t.modal.otp_title
          }));
          var l = function sendToken(e) {
              e.preventDefault();
              var n = $(e.target),
                o = function hideError() {
                  $(".alert.alert-danger", n).remove()
                };
              return o(), $.ajax({
                url: n.attr("action"),
                data: $.param(n.serializeArray()),
                async: !0,
                method: "POST",
                success: function success(e) {
                  "Ok" === e ? (window.location.reload(), !0) : function showError(t) {
                    o(), t && t.length && n.prepend(r({
                      text: t
                    }))
                  }(t.badTokenError)
                }
              }), !1
            },
            c = e.fieldsContainer.serializeArray();
          return c.push({
            name: "save",
            value: 1
          }), $.ajax({
            url: e.fieldsContainer.attr("action"),
            data: $.param(c),
            async: !1,
            method: "POST",
            success: function success(e) {
              if ("success" == e.status) {
                var n = $("#STCPayOtpFormModal");
                $("[name=otp_ref]", n).val(e.data.otp_ref), $("[name=pmt_ref]", n).val(e.data.pmt_ref), $("form", n).attr("action", e.data.processing_url), $("form", n).on("submit", l), n.modal("show"), n.on("hide.bs.modal", (function() {
                  $("#qr-modal").remove(), window.location.reload()
                })), o()
              } else "error" == e.status && i(e.error && e.error.length ? e.error : t.defaultErrorText)
            }
          }), !1
        })), $("#STCPayOtpForm").on("submit", (function(e) {
          var n = e,
            r = $("#method").val();
          if (t.type != r) return !0;
          var a = n.fieldsContainer.serializeArray();
          return a.push({
            name: "save",
            value: 1
          }), $.ajax({
            url: n.fieldsContainer.attr("action"),
            data: $.param(a),
            async: !1,
            method: "POST",
            success: function success(e) {
              return "success" == e.status ? (window.location.replace("/add-funds"), !0, o()) : "error" == e.status && i(e.error && e.error.length ? e.error : t.defaultErrorText), !1
            }
          }), !1
        }))
      },
      initBlueSnap: function initBlueSnap(t) {
        var e = this;
        $("button", e.fieldsContainer).on("click", (function(n) {
          var r = $("#method").val();
          if (t.type != r) return !0;
          var o = $("#amount").val();
          if (!o || isNaN(o)) return !0;
          n.preventDefault();
          var i = null,
            a = null;
          return $.ajax({
            url: e.fieldsContainer.attr("action"),
            data: e.fieldsContainer.serialize() + "&save=true",
            async: !1,
            method: "POST",
            success: function success(t) {
              "success" == t.status && (i = t.data.pfToken, a = t.data.transactionId)
            }
          }), !i || ($("#field-transaction_id").val(a), $("#field-token").val(i), n.preventDefault(), bluesnap.openCheckout({
            token: i,
            currency: t.currency,
            description: t.description,
            language: t.lang,
            title: t.title,
            amount: o
          }, (function(t) {
            1 == t.code && $.ajax({
              url: e.fieldsContainer.attr("action"),
              data: e.fieldsContainer.serialize() + "&save=true",
              async: !1,
              method: "POST"
            }), window.location.reload()
          })), !1)
        }))
      },
      initRazorpay: function initRazorpay(t) {
        var e = this,
          n = function hideError() {
            $(".alert.alert-danger", e.fieldsContainer).remove()
          };
        $("button", e.fieldsContainer).on("click", (function(o) {
          var i = $("#method").val();
          if (t.type != i) return !0;
          var a = $("#amount").val();
          if (!a || isNaN(a)) return !0;
          o.preventDefault();
          var s = null;
          if ($.ajax({
              url: e.fieldsContainer.attr("action"),
              data: e.fieldsContainer.serialize() + "&save=true",
              async: !1,
              method: "POST",
              success: function success(o) {
                "success" == o.status ? (s = o.data, n()) : function showError(t) {
                  n(), t && t.length && e.fieldsContainer.prepend(r({
                    text: t
                  }))
                }(o.error && o.error.length ? o.error : t.defaultErrorText)
              }
            }), !s) return !0;
          var l = s.options;
          l.handler = function(t) {
            document.getElementById("field-razorpay_payment_id").value = t.razorpay_payment_id, document.getElementById("field-razorpay_signature").value = t.razorpay_signature, document.getElementById("field-razorpay_order_id").value = l.order_id, document.getElementById("field-transaction_id").value = s.transactionId, e.fieldsContainer.submit()
          }, l.theme.image_padding = !1, l.modal = {
            ondismiss: function ondismiss() {
              console.log("This code runs when the popup is closed")
            },
            escape: !0,
            backdropclose: !1
          }, new Razorpay(l).open(), o.preventDefault()
        }))
      },
      initStripe: function initStripe(t) {
        var e = this;
        try {
          var n = StripeCheckout.configure($.extend({}, !0, t.configure, {
            token: function token(t) {
              $("#field-token").val(t.id), $("#field-email").val(t.email), e.fieldsContainer.submit()
            }
          }))
        } catch (t) {
          return void console.log("Something is wrong...", t)
        }
        $("button", e.fieldsContainer).on("click", (function(r) {
          var o = $("#method").val();
          if (t.type != o) return !0;
          var i = !1;
          if ($.ajax({
              url: e.fieldsContainer.attr("action"),
              data: e.fieldsContainer.serialize(),
              async: !1,
              method: "POST",
              success: function success(t) {
                "success" == t.status && (i = !0)
              }
            }), !i) return !0;
          var a = $.extend({}, !0, t.open);
          return a.amount = 100 * $("#amount").val(), n.open(a), r.preventDefault(), !1
        })), $(window).on("popstate", (function() {
          n.close()
        }))
      },
      initStripe3ds: function initStripe3ds(t) {
        var e = this;
        try {
          var n = Stripe(t.configure.key)
        } catch (t) {
          return void console.log("Something is wrong...", t)
        }
        var r = null,
          o = StripeCheckout.configure($.extend({}, !0, t.configure, {
            token: function token(t) {
              n.createSource({
                type: "card",
                token: t.id
              }).then((function(e) {
                !e.error && e.source || window.location.reload(), i(e.source, t)
              }))
            }
          })),
          i = function sourceHandler(e, o) {
            "not_supported" !== e.card.three_d_secure ? n.createSource({
              type: "three_d_secure",
              amount: r,
              currency: t.open.currency,
              three_d_secure: {
                card: e.id
              },
              redirect: {
                return_url: t.auth_3ds_request.returnUrl + "&amount=" + r + "&method=" + t.type + "&token=" + o.id
              }
            }).then((function(t) {
              t.error ? window.location.reload() : a(t.source, o)
            })) : s(o.id, e.id)
          },
          a = function source3Dhandler(t, e) {
            window.location.replace(t.redirect.url)
          },
          s = function submitForm(t, n) {
            $("#field-token").val(t), $("#field-source").val(n), e.fieldsContainer.submit()
          };
        if (/stripe3ds_auth_callback/.test(window.location.href)) {
          var l = new URLSearchParams(window.location.search),
            c = l.get("method"),
            u = l.get("token"),
            d = l.get("source"),
            p = l.get("amount"),
            f = l.get("client_secret");
          if (!(c && u && d && p && f)) return;
          history.pushState({}, document.title, t.auth_3ds_request.errorUrl), $("#method").val(c).trigger("change"), $("#amount").val(p / 100), s(u, d)
        }
        $("button", e.fieldsContainer).on("click", (function(n) {
          var i = $("#method").val();
          if (t.type != i) return !0;
          var a = !1;
          if (r = 100 * $("#amount").val(), $.ajax({
              url: e.fieldsContainer.attr("action"),
              data: e.fieldsContainer.serialize(),
              async: !1,
              method: "POST",
              success: function success(t) {
                "success" == t.status && (a = !0)
              }
            }), !a) return !0;
          var s = $.extend({}, !0, t.open);
          return s.amount = r, o.open(s), n.preventDefault(), !1
        })), $(window).on("popstate", (function() {
          o.close()
        }))
      },
      initStripeAlipay: function initStripeAlipay(t) {
        var e = this,
          n = $("button", e.fieldsContainer);
        try {
          var r = Stripe(t.configure.key)
        } catch (t) {
          return void console.log("Something is wrong...", t)
        }
        n.on("click", (function(n) {
          var o = $("#method").val();
          if (t.type != o) return !0;
          var i = null;
          if ($(".alert.alert-danger", e.fieldsContainer).remove(), $.ajax({
              url: e.fieldsContainer.attr("action"),
              data: e.fieldsContainer.serialize() + "&save=true",
              async: !1,
              method: "POST",
              success: function success(t) {
                "success" == t.status && (i = t.data.clientSecret)
              }
            }), !i) return !0;
          n.preventDefault(), r.confirmAlipayPayment(i, {
            return_url: t.configure.notify_url
          }).then((function(t) {
            t.error || location.reload()
          }))
        }))
      },
      initStripeWeChatPay: function initStripeWeChatPay(t) {
        if (t.configure.cs && t.configure.key) {
          var e = $("button[type=submit]", this.fieldsContainer);
          e.prop("disabled", !0);
          try {
            new Stripe(t.configure.key).confirmWechatPayPayment(t.configure.cs, {
              payment_method_options: {
                wechat_pay: {
                  client: "web"
                }
              }
            }).then((function(t) {
              e.prop("disabled", !1), console.log(t)
            }))
          } catch (t) {
            console.log("Stripe WeChat Pay: error while obtaining the QR-code (" + t.message + ").")
          }
        }
      },
      initStripeIndia: function initStripeIndia(t) {
        var e = this,
          r = $("button", e.fieldsContainer);
        try {
          var o = Stripe(t.configure.key)
        } catch (t) {
          return void console.log("Something is wrong...", t)
        }
        var i = o.elements().create("card", {
            style: {
              base: {
                color: "#32325d",
                fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                fontSmoothing: "antialiased",
                fontSize: "16px",
                "::placeholder": {
                  color: "#aab7c4"
                }
              },
              invalid: {
                color: "#fa755a",
                iconColor: "#fa755a"
              }
            }
          }),
          a = n(328)({
            label: t.configure.cardLabel
          });
        $(a).insertAfter($(".form-group").eq(1)), i.mount("#stripe-card-element"), r.on("click", (function(n) {
          var a = $("#method").val();
          if (t.type != a) return !0;
          n.preventDefault();
          var s = null;
          if ($.ajax({
              url: e.fieldsContainer.attr("action"),
              data: e.fieldsContainer.serialize() + "&save=true",
              async: !1,
              method: "POST",
              success: function success(t) {
                "success" == t.status && (s = t.data.clientSecret)
              }
            }), !s) return !0;
          r.data("secret", s), o.handleCardPayment(s, i, {
            payment_method_data: {
              billing_details: {
                name: $("#field-name").val(),
                address: {
                  line1: $("#field-line1").val(),
                  city: $("#field-city").val(),
                  state: $("#field-state").val(),
                  postal_code: $("#field-postal_code").val(),
                  country: $("#field-country").val()
                }
              }
            }
          }).then((function(t) {
            t.error || location.reload()
          }))
        }))
      },
      closeStripeIndia: function closeStripeIndia() {
        $("#stripe-card-element").parent().remove()
      },
      initStripePay: function initStripePay(t) {
        var e = this,
          r = $("button", e.fieldsContainer),
          o = "payment-request-button",
          i = n(329);
        r.after(i({
          id: o
        }));
        var a = $("#" + o);
        try {
          var s = Stripe(t.configure.key)
        } catch (t) {
          return void console.log("Something is wrong...", t)
        }
        var l = s.paymentRequest(t.payment_request);
        l.on("token", (function(t) {
          $("#field-token").val(t.token.id), $("#field-email").val(t.payerEmail), t.complete("success"), e.fieldsContainer.submit()
        }));
        var c = s.elements().create("paymentRequestButton", {
          paymentRequest: l,
          style: {
            paymentRequestButton: t.payment_request_button
          }
        });
        l.canMakePayment().then((function(t) {
          t && c.mount("#" + o)
        })), $(document).on("change", "#method", (function(e) {
          var n = $(this).val();
          a.addClass("hidden"), r.removeClass("hidden"), n == t.type && (r.addClass("hidden"), a.removeClass("hidden"))
        })), $(document).on("change", "#amount", (function(e) {
          l.update({
            total: {
              label: t.payment_request.total.label,
              amount: 100 * $("#amount").val()
            }
          })
        }))
      },
      initStripeSepa: function initStripeSepa(t) {
        var e = this;
        $("#field-name").attr("required", !0).attr("minlength", "3"), $("#field-email").attr("required", !0).attr("type", "email");
        try {
          var o = Stripe(t.configure.key)
        } catch (t) {
          return void console.log("Something is wrong...", t)
        }
        var i = o.elements().create("iban", {
            style: {
              base: {
                color: "#32325d",
                fontFamily: '-apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif',
                fontSmoothing: "antialiased",
                fontSize: "16px",
                "::placeholder": {
                  color: "#aab7c4"
                },
                ":-webkit-autofill": {
                  color: "#32325d"
                }
              },
              invalid: {
                color: "#fa755a",
                iconColor: "#fa755a",
                ":-webkit-autofill": {
                  color: "#fa755a"
                }
              }
            },
            supportedCountries: ["SEPA"]
          }),
          a = n(330)({
            label: t.ibanLabel
          });
        $(a).insertAfter($(".form-group", e.fieldsContainer).last()), i.mount("#stripe-iban-element");
        var s = $("#stripe-iban-bank-name"),
          l = function hideError() {
            $(".alert.alert-danger", e.fieldsContainer).remove()
          },
          c = function showError(t) {
            l(), t && t.length && e.fieldsContainer.prepend(r({
              text: t
            }))
          };
        i.on("change", (function(t) {
          c(t.error ? t.error.message : ""), s.text(t.bankName ? t.bankName : "")
        })), e.fieldsContainer.on("submit", (function(n) {
          var r = $("#method").val();
          if (t.type != r) return !0;
          n.preventDefault();
          var a = {
            type: "sepa_debit",
            currency: "eur",
            owner: {
              name: $("#field-name").val(),
              email: $("#field-email").val()
            },
            mandate: {
              notification_method: "email"
            }
          };
          o.createSource(i, a).then((function(n) {
            n.error ? c(n.error.message) : (l(), $("#field-source", e.fieldsContainer).val(JSON.stringify(n.source)), custom.ajax({
              url: e.fieldsContainer.attr("action"),
              data: e.fieldsContainer.serialize() + "&save=true",
              async: !1,
              method: "POST",
              success: function success(e) {
                "success" == e.status ? window.location.reload() : "error" == e.status && c(e.error && e.error.length ? e.error : t.defaultErrorText)
              },
              error: function error(t, e, n) {
                e && "abort" === e.toLowerCase() || console.log("Something was wrong...", e, n, t)
              }
            }))
          }))
        }))
      },
      closeStripeSepa: function closeStripeSepa() {
        $("#stripe-iban-element").parent().remove()
      },
      initMidtrans: function initMidtrans(t) {
        var e = this;
        $("button", e.fieldsContainer).on("click", (function(n) {
          var r = $("#method").val(),
            o = $("#amount").val(),
            i = !1;
          return t.type != r || parseInt(o, 10) != o || (snap.show(), $.ajax({
            url: e.fieldsContainer.attr("action"),
            data: e.fieldsContainer.serialize() + "&save=true",
            async: !1,
            method: "POST",
            success: function success(t) {
              if ("success" == t.status) {
                var e = t.data.token;
                snap.pay(e)
              } else i = !0, snap.hide()
            }
          }), i ? void 0 : (n.preventDefault(), !1))
        }))
      },
      initPaytm: function initPaytm(t) {
        var e = this,
          r = n(61),
          o = n(38),
          i = $("#method", e.fieldsContainer).parents(".form-group"),
          a = $("#amount", e.fieldsContainer).parents(".form-group"),
          s = $("#amount_label", a),
          l = $("button[type=submit]", e.fieldsContainer),
          c = s.html(),
          u = l.html();
        $(document).on("change", "#method", (function(n) {
          var a = $(this).val();
          if (s.html(c), l.html(u), a == t.type) {
            n.stopImmediatePropagation(), $(".fields", e.fieldsContainer).remove();
            var d = [];
            e.fieldOptions[a].description && d.push(o($.extend({}, !0, e.fieldOptions[a].description, {
              value: t.description
            }))), e.fieldOptions[a].transaction_id && d.push(r(e.fieldOptions[a].transaction_id)), e.fieldOptions[a].amount && s.html(e.fieldOptions[a].amount.label), e.fieldOptions[a].submit && l.html(e.fieldOptions[a].submit.label), i.after(d.join("\r\n"))
          }
        }))
      },
      initTransactionImap: function initTransactionImap(t) {
        var e = this,
          r = n(61),
          o = n(38),
          i = $("#method", e.fieldsContainer).parents(".form-group"),
          a = $("#amount", e.fieldsContainer).parents(".form-group"),
          s = $("#amount_label", a),
          l = s.html();
        $(document).on("change", "#method", (function(n) {
          var a = $(this).val();
          if (s.html(l), a == t.type) {
            n.stopImmediatePropagation(), $(".fields", e.fieldsContainer).remove();
            var c = [];
            e.fieldOptions[a].instruction && c.push(o($.extend({}, !0, e.fieldOptions[a].instruction, {
              value: t.description
            }))), e.fieldOptions[a].transaction_id && c.push(r(e.fieldOptions[a].transaction_id)), e.fieldOptions[a].amount && s.html(e.fieldOptions[a].amount.label), i.after(c.join("\r\n"))
          }
        }))
      },
      initPaymobKiosk: function initPaymobKiosk(t) {
        var e = this,
          r = n(38),
          o = $("#method", e.fieldsContainer).parents(".form-group");
        $(document).on("change", "#method", (function(n) {
          var i = $(this).val();
          i == t.type && (n.stopImmediatePropagation(), o.after(r($.extend({}, !0, e.fieldOptions[i].instruction, {
            value: t.description
          }))))
        }))
      },
      initQiwi: function initQiwi(t) {
        var e = this,
          r = n(61),
          o = n(38),
          i = $("#method", e.fieldsContainer).parents(".form-group"),
          a = $("#amount", e.fieldsContainer).parents(".form-group"),
          s = $("#amount_label", a),
          l = $("button[type=submit]", e.fieldsContainer),
          c = s.html(),
          u = l.html();
        $(document).on("change", "#method", (function(n) {
          var a = $(this).val();
          if (s.html(c), l.html(u), a == t.type) {
            n.stopImmediatePropagation(), $(".fields", e.fieldsContainer).remove();
            var d = [];
            e.fieldOptions[a].instruction && d.push(o($.extend({}, !0, e.fieldOptions[a].instruction, {
              value: t.instruction
            }))), e.fieldOptions[a].transaction_id && d.push(r(e.fieldOptions[a].transaction_id)), e.fieldOptions[a].amount && s.html(e.fieldOptions[a].amount.label), e.fieldOptions[a].submit && l.html(e.fieldOptions[a].submit.label), i.after(d.join("\r\n"))
          }
        }))
      },
      initPhonePe: function initPhonePe(t) {
        var e = this,
          r = n(38),
          o = $("#method", e.fieldsContainer).parents(".form-group"),
          i = $("#amount", e.fieldsContainer).parents(".form-group"),
          a = $("button[type=submit]", e.fieldsContainer),
          s = $("input", i),
          l = $("select", o);
        $(document).on("change", "#method", (function(n) {
          var i = $(this).val();
          if (i == t.type) {
            n.stopImmediatePropagation();
            var c = [];
            e.fieldOptions[i].description && t.description && c.push(r($.extend({}, !0, e.fieldOptions[i].description, {
              value: t.description
            }))), t.amount && (s.val(t.amount), s.prop("disabled", !0), l.prop("disabled", !0), a.hide()), o.after(c.join("\r\n"))
          }
        }))
      },
      initKlikbca: function initKlikbca(t) {
        var e = this,
          r = n(38),
          o = $("#method", e.fieldsContainer).parents(".form-group"),
          i = $("#amount", e.fieldsContainer).parents(".form-group"),
          a = $("button[type=submit]", e.fieldsContainer),
          s = $("input", i),
          l = $("select", o);
        $(document).on("change", "#method", (function(n) {
          var i = $(this).val();
          if (i == t.type) {
            n.stopImmediatePropagation();
            var c = [];
            e.fieldOptions[i].description && t.description && c.push(r($.extend({}, !0, e.fieldOptions[i].description, {
              value: t.description
            }))), t.amount && (s.val(t.amount), s.prop("disabled", !0), l.prop("disabled", !0), a.hide()), o.after(c.join("\r\n"))
          }
        }))
      },
      initPaysky: function initPaysky(t) {
        var e = this,
          n = t.configure,
          r = $("#method"),
          o = $("button[type=submit]", e.fieldsContainer),
          i = $("<button />", n).hide();
        o.after(i), o.on("click", (function(o) {
          if (r.val() == t.type) {
            o.stopImmediatePropagation();
            var i = e.fieldsContainer.serializeArray();
            i.push({
              name: "save",
              value: !0
            });
            return $.ajax({
              url: e.fieldsContainer.attr("action"),
              data: $.param(i),
              method: "POST",
              success: function success(t) {
                if ("success" == t.status) {
                  var e = {
                    url: t.data.processingUrl,
                    async: !1,
                    method: "POST",
                    success: function success(t) {
                      window.location.reload()
                    },
                    error: function error() {
                      window.location.refrereloadsh()
                    }
                  };
                  Lightbox.Checkout.configure = {
                    MID: n.mid,
                    TID: n.tid,
                    AmountTrxn: t.data.amount,
                    MerchantReference: t.data.merchantReference,
                    TrxDateTime: t.data.transactionDate,
                    SecureHash: t.data.secureHash,
                    completeCallback: function completeCallback(t) {
                      e.data = {
                        completeData: t
                      }, $.ajax(e)
                    },
                    errorCallback: function errorCallback(r) {
                      e.data = {
                        errorData: !0,
                        info: r,
                        response: t,
                        configure: n
                      }, $.ajax(e)
                    },
                    cancelCallback: function cancelCallback() {
                      e.data = {
                        cancelData: !0,
                        info: i,
                        response: t,
                        configure: n
                      }, $.ajax(e)
                    }
                  }, Lightbox.Checkout.showLightbox()
                }
              }
            }), !1
          }
        }))
      },
      initAuthorize: function initAuthorize(t) {
        var e = t.configure,
          n = $("#amount"),
          r = $("#method"),
          o = $("button[type=submit]", this.fieldsContainer),
          i = $("<button />", e).hide();
        o.after(i), o.on("click", (function(e) {
          if (r.val() == t.type && 0 < 1 * $.trim(n.val())) return e.stopImmediatePropagation(), i.trigger("click"), !1
        }))
      },
      responseAuthorizeHandler: function responseAuthorizeHandler(t) {
        if ("Error" === t.messages.resultCode)
          for (var e = 0; e < t.messages.message.length;) alert(t.messages.message[e].code + ": " + t.messages.message[e].text), e += 1;
        else $("#field-data_descriptor").val(t.opaqueData.dataDescriptor), $("#field-data_value").val(t.opaqueData.dataValue), $("form").submit()
      },
      initBuypayer: function initBuypayer(t) {
        t.content && window.open(t.content, "_top")
      },
      initMastercard: function initMastercard(t) {
        var e = this;
        $("button", e.fieldsContainer).on("click", (function(n) {
          $(".alert").remove();
          var r = $("#method").val();
          if (t.type != r) return !0;
          var o = !1,
            i = null,
            a = null,
            s = e.fieldsContainer.serializeArray();
          return s.push({
            name: "save",
            value: 1
          }), $.ajax({
            url: e.fieldsContainer.attr("action"),
            data: $.param(s),
            async: !1,
            method: "POST",
            success: function success(t) {
              "success" == t.status && (o = !0, i = t.data.payment_id, a = t.data.session_id)
            }
          }), !o || (t.configure.order.amount = function() {
            return $("#amount").val()
          }, t.configure.order.id = i, t.configure.session.id = a, t.configure.callback.error = function(t) {
            console.log(JSON.stringify(t))
          }, t.configure.callback.cancel = function(t) {
            console.log("Payment cancelled")
          }, Checkout.configure(t.configure), Checkout.showLightbox(), !1)
        }))
      },
      initSquareup: function initSquareup(t) {
        var e, r = this,
          o = t.applicationId || null,
          i = t.locationId || null,
          a = n(331);
        $("body").append(a({
          modal_title: t.modal.modal_title,
          submit_title: t.modal.submit_title,
          cancel_title: t.modal.cancel_title,
          card_number: t.modal.card_number,
          cvv: t.modal.cvv,
          expiration_date: t.modal.expiration_date,
          postal_code: t.modal.postal_code
        }));
        var s = $("#squareupCardModal"),
          l = $("#nonce-form"),
          c = $("#card-error-container");
        $("button", r.fieldsContainer).on("click", (function(e) {
          var n = $("#method").val();
          if (t.type != n) return !0;
          var o = !1;
          return $.ajax({
            url: r.fieldsContainer.attr("action"),
            data: r.fieldsContainer.serialize(),
            async: !1,
            method: "POST",
            success: function success(t) {
              "success" === t.status && (o = !0)
            }
          }), !o || (s.modal("show"), e.preventDefault(), !1)
        })), s.on("show.bs.modal", (function(n) {
          if (!SqPaymentForm.isSupportedBrowser()) throw "Browser not supported!";
          (e = new SqPaymentForm({
            applicationId: o,
            locationId: i,
            inputClass: "sq-input",
            autoBuild: !1,
            applePay: !1,
            masterpass: !1,
            callbacks: {
              createPaymentRequest: function createPaymentRequest() {
                return {
                  requestShippingAddress: !1,
                  requestBillingInfo: !1,
                  currencyCode: "USD",
                  countryCode: "US",
                  total: {
                    label: "MERCHANT NAME",
                    amount: "100",
                    pending: !1
                  },
                  lineItems: [{
                    label: "Subtotal",
                    amount: "100",
                    pending: !1
                  }]
                }
              },
              cardNonceResponseReceived: function cardNonceResponseReceived(e, n, o) {
                c.toggleClass("hidden", !e || !!n), e ? _.isArray(e) && e[0].hasOwnProperty("message") && c.html(e[0].message) : n ? ($("#field-card-nonce").val(n), s.modal("hide"), r.fieldsContainer.submit()) : c.html(t.modal.default_card_error)
              },
              unsupportedBrowserDetected: function unsupportedBrowserDetected() {},
              inputEventReceived: function inputEventReceived(t) {
                t.eventType
              },
              paymentFormLoaded: function paymentFormLoaded() {
                console.log("The form loaded!")
              }
            }
          })).build(), e.recalculateSize()
        })), s.on("hide.bs.modal", (function(t) {
          if (c.html(""), c.addClass("hidden"), !e) throw "No payment form!";
          e.destroy(), e = null
        })), l.on("submit", (function(t) {
          if (t.preventDefault(), !e) throw "No payment form!";
          e.requestCardNonce()
        }))
      },
      initCheckoutCom: function initCheckoutCom(t) {
        var e = n(332);
        $("body").append(e({
          modal_title: t.modal.modal_title,
          submit_title: t.modal.submit_title,
          cancel_title: t.modal.cancel_title
        }));
        var r = this,
          o = $("#checkoutcomCardModal"),
          i = $("form", o),
          a = $(":submit", o);
        a.attr("disabled", !0);
        var s = {
          publicKey: t.public_key,
          containerSelector: ".frames-container",
          cardValidationChanged: function cardValidationChanged() {
            a.attr("disabled", !Frames.isCardValid())
          },
          cardSubmitted: function cardSubmitted() {
            a.attr("disabled", !0)
          }
        };
        i.on("submit", (function(t) {
          t.preventDefault(), Frames.submitCard().then((function(t) {
            $("#field-card-token").val(t.cardToken), o.modal("hide"), r.fieldsContainer.submit()
          })).catch((function(t) {
            console.log(t)
          }))
        })), $("button", r.fieldsContainer).on("click", (function(e) {
          var n = $("#method").val(),
            i = !1;
          return t.type != n || ($.ajax({
            url: r.fieldsContainer.attr("action"),
            data: r.fieldsContainer.serialize(),
            async: !1,
            method: "POST",
            success: function success(t) {
              "success" === t.status && (i = !0)
            }
          }), !i || (Frames.init(s), o.modal("show"), e.preventDefault(), !1))
        })), o.on("show.bs.modal", (function(t) {
          $("input", i).val("")
        }))
      },
      initCheckoutCom3Ds: function initCheckoutCom3Ds(t) {
        var e = this,
          n = {};
        $("button", e.fieldsContainer).on("click", (function(r) {
          var o = $("#method").val(),
            i = !1;
          return t.type != o || ($.ajax({
            url: e.fieldsContainer.attr("action"),
            data: e.fieldsContainer.serialize(),
            async: !1,
            method: "POST",
            success: function success(t) {
              "success" === t.status && (i = !0)
            }
          }), !i || (n = $.extend({}, t.init_options, {
            value: 100 * $("#amount").val(),
            customerName: $("#field-billing_name").val(),
            billingDetails: {
              addressLine1: $("#field-billing_line_1").val(),
              addressLine2: "",
              postcode: $("#field-billing_postal_code").val(),
              country: $("#field-billing_country_code").val(),
              city: $("#field-billing_city").val(),
              phone: {
                number: $("#field-billing_phone").val()
              }
            },
            cardTokenised: function cardTokenised(t) {
              $("#field-card-token").val(t.data.cardToken), e.fieldsContainer.submit()
            }
          }), Checkout.configure(n), Checkout.open(), r.preventDefault(), !1))
        }))
      },
      initManual: function initManual(t) {
        var e = this,
          r = n(38),
          o = $("#method", e.fieldsContainer).parents(".form-group"),
          i = $("#amount", e.fieldsContainer).parents(".form-group"),
          a = $("button[type=submit]", e.fieldsContainer);
        $(document).on("change", "#method", (function(n) {
          var s = $(this).val(),
            l = [];
          s == t.type && (n.stopImmediatePropagation(), a.hide(), i.hide(), e.fieldOptions[s].instruction && l.push(r($.extend({}, !0, e.fieldOptions[s].instruction, {
            value: t.instruction
          }))), o.after(l.join("\r\n")))
        }))
      },
      initOmise: function initOmise(t) {
        var e, n = this;
        $(document).on("change", "#method", (function(n) {
          $(this).val() == t.type && ((e = $.extend({}, !0, t.config)).submitFormTarget = "#form_id", e.onCreateTokenSuccess = o, e.onFormClosed = r, OmiseCard.configure(e))
        }));
        var r = function formClosedhandler() {},
          o = function createTokenSuccessHandler(t) {
            $("#field-card-token").val(t), n.fieldsContainer.submit()
          };
        $("button", n.fieldsContainer).on("click", (function(e) {
          var r = $("#method").val();
          if (t.type != r) return !0;
          var o = !1;
          return $.ajax({
            url: n.fieldsContainer.attr("action"),
            data: n.fieldsContainer.serialize(),
            async: !1,
            method: "POST",
            success: function success(t) {
              "success" == t.status && (o = !0)
            }
          }), !o || (OmiseCard.open({
            amount: 100 * $("#amount").val()
          }), e.preventDefault(), !1)
        }))
      },
      initCard: function initCard(t) {
        var e = $("#amount", this.fieldsContainer).parents(".form-group"),
          r = n(123);
        $(document).on("change", "#method", (function(n) {
          var o = [];
          $(this).val() == t.type && (o.push(r($.extend({}, !0, t.card_fields))), e.after(o.join("\r\n")))
        })), $("button", this.fieldsContainer).on("click", (function(e) {
          _.each(t.card_fields, (function(t) {
            $("#field-" + t.name).val($("#field-visible-" + t.name).val())
          }))
        }))
      },
      initStripeCheckout: function initStripeCheckout(t) {
        var e = this;
        try {
          var n = Stripe(t.configure.public_key)
        } catch (t) {
          return void console.log("Something is wrong...", t)
        }
        $("button", e.fieldsContainer).on("click", (function(r) {
          var o = $("#method").val();
          if (t.type != o) return !0;
          var i = !1,
            a = null,
            s = e.fieldsContainer.serializeArray();
          return s.push({
            name: "save",
            value: 1
          }), $.ajax({
            url: e.fieldsContainer.attr("action"),
            data: $.param(s),
            async: !1,
            method: "POST",
            success: function success(t) {
              "success" == t.status && (i = !0, a = t.data.session_id)
            }
          }), !i || (n.redirectToCheckout({
            sessionId: a
          }).then((function(t) {
            console.log("Something is wrong...", t)
          })), !1)
        }))
      },
      initPay2Pay: function initPay2Pay(t) {
        var e = $("#amount", this.fieldsContainer).parents(".form-group"),
          r = n(123);
        $(document).on("change", "#method", (function(n) {
          var o = [];
          $(this).val() == t.type && (o.push(r($.extend({}, !0, t.card_fields))), e.after(o.join("\r\n")))
        })), $("button", this.fieldsContainer).on("click", (function() {
          _.each(t.card_fields, (function(t) {
            $("#field-" + t.name).val($("#field-visible-" + t.name).val())
          }))
        }))
      },
      initQrModal: function initQrModal(t) {
        var e = this,
          o = function hideError() {
            $(".alert.alert-danger", e.fieldsContainer).remove()
          };
        $("button", e.fieldsContainer).on("click", (function() {
          var i = $("#method").val();
          if (t.type != i) return !0;
          var a = null,
            s = null,
            l = n(333);
          $("body").append(l({
            close_title: t.modal.close_title
          }));
          var c = $("#qr-modal");
          c.modal("show"), c.on("hide.bs.modal", (function() {
            $("#qr-modal").remove(), window.location.reload()
          }));
          var u = e.fieldsContainer.serializeArray();
          return u.push({
            name: "save",
            value: 1
          }), $.ajax({
            url: e.fieldsContainer.attr("action"),
            data: $.param(u),
            method: "POST",
            success: function success(n) {
              if ($("#qr-modal-spinner").hide(), "success" == n.status) {
                var i = $("#qr-code-image");
                !0, o(), a = n.data.qr_code, s = "data:image/png;base64," + a, i.prop("src", s)
              } else "error" == n.status && function showError(t) {
                o(), t && t.length && e.fieldsContainer.prepend(r({
                  text: t
                }))
              }(n.error && n.error.length ? n.error : t.defaultErrorText)
            }
          }), !1
        }))
      },
      initGbPrimePay3ds: function initGbPrimePay3ds(t) {
        var e = n(334);
        $("body").append(e({
          modal_title: t.modal.modal_title,
          close_title: t.modal.close_title
        }));
        var r = $("#gbPrimePay3dsCardModal"),
          o = $("#amount", this.fieldsContainer),
          i = $("#gb-form"),
          a = $("#gb-modal-spinner");
        i.on("DOMSubtreeModified", (function() {
          a.hide()
        })), r.on("hide.bs.modal", (function() {
          window.location.reload()
        })), $("button", this.fieldsContainer).on("click", (function(e) {
          var n = $("#method").val();
          return t.type != n || (new GBPrimePay({
            publicKey: t.public_key,
            gbForm: "#gb-form",
            merchantForm: "form",
            amount: o.val(),
            env: 0 == t.test_mode ? "prd" : "test"
          }), r.modal("show"), e.preventDefault(), !1)
        }))
      },
      initAdyen: function initAdyen(t) {
        var e = this;
        if (t.paymentMethods && "object" == _typeof(t.paymentMethods) && !$.isEmptyObject(t.paymentMethods)) {
          var r = n(335);
          $("body").append(r({
            modal_title: t.modal.modal_title,
            close_title: t.modal.close_title
          }));
          var o = $("#adyenModal");
          $("#amount", e.fieldsContainer);
          o.on("hide.bs.modal", (function() {
            window.location.reload()
          }));
          var i = {
            paymentMethodsResponse: t.paymentMethods,
            clientKey: t.clientKey,
            locale: "en-US",
            environment: t.environment,
            onSubmit: function onSubmit(n, r) {
              $("#field-state").val(JSON.stringify(n.data)), $.ajax({
                url: e.fieldsContainer.attr("action"),
                data: e.fieldsContainer.serialize() + "&save=true",
                async: !1,
                method: "POST",
                success: function success(e) {
                  "success" == e.status ? e.data.action ? r.handleAction(e.data.action) : window.location.reload() : "error" == e.status && showError(e.error && e.error.length ? e.error : t.defaultErrorText)
                }
              })
            },
            card: {
              hasHolderName: !0,
              holderNameRequired: !0,
              enableStoreDetails: !0,
              hideCVC: !1,
              name: "Credit or debit card"
            }
          };
          new AdyenCheckout(i);
          $("button", e.fieldsContainer).on("click", (function(n) {
            var r = $("#method").val();
            if (t.type != r) return !0;
            var i = !1;
            return $.ajax({
              url: e.fieldsContainer.attr("action"),
              data: e.fieldsContainer.serialize(),
              async: !1,
              method: "POST",
              success: function success(t) {
                "success" == t.status && (i = !0)
              }
            }), !i || (o.modal("show"), n.preventDefault(), !1)
          }))
        }
      },
      initShopinext: function initShopinext(t) {
        var e = this;
        $("button", e.fieldsContainer).on("click", (function(r) {
          var o = $("#method").val();
          if (t.type != o) return !0;
          var i = n(336);
          $("body").append(i({
            modal_title: t.modal.modal_title,
            submit_title: t.modal.submit_title,
            cancel_title: t.modal.cancel_title,
            card_name: t.modal.card_name,
            card_number: t.modal.card_number,
            cvv: t.modal.cvv,
            expiry_month: t.modal.expiry_month,
            expiry_year: t.modal.expiry_year
          }));
          var a = $("#shopinextCardModal"),
            s = $("#shopinextCardForm");
          a.on("hide.bs.modal", (function() {
            window.location.reload()
          })), $("#card-number", a).mask("0000 0000 0000 0000"), $("#expiration-month", a).mask("00"), $("#expiration-year", a).mask("0000"), $("#cvv", a).mask("0000");
          var l = !1,
            c = "",
            u = e.fieldsContainer.serializeArray();
          return u.push({
            name: "save",
            value: 1
          }), $.ajax({
            url: e.fieldsContainer.attr("action"),
            data: $.param(u),
            async: !1,
            method: "POST",
            success: function success(t) {
              "success" === t.status && (l = !0, c = t.data.action)
            }
          }), !l || (a.modal("show"), s.attr("action", c), r.preventDefault(), !1)
        }))
      },
      initCryptochill: function initCryptochill(t) {
        var e = this,
          r = "cryptochill_payment_request_btn",
          o = n(337);

        function onPaymentOpen(t, e) {
          $("#" + r).remove()
        }
        $("button", e.fieldsContainer).on("click", (function(n) {
          var i = $("#method").val();
          if (t.type != i) return !0;
          var a = e.fieldsContainer.serializeArray();
          return a.push({
            name: "save",
            value: 1
          }), $.ajax({
            url: e.fieldsContainer.attr("action"),
            data: $.param(a),
            async: !1,
            method: "POST",
            success: function success(n) {
              if ("success" == n.status) return $(e.fieldsContainer).after(o({
                id: r,
                amount: n.data.amount,
                product: n.data.product,
                passthrough: n.data.passthrough,
                currency: n.data.currency
              })), CryptoChill.setup({
                account: t.configure.account_id,
                profile: t.configure.profile_id,
                onOpen: onPaymentOpen
              }), !1
            }
          }), $("#" + r).click(), !1
        }))
      },
      initGeidea: function initGeidea(t) {
        var e = this,
          n = function hideError() {
            $(".alert.alert-danger", e.fieldsContainer).remove()
          },
          o = function showError(t) {
            n(), t && t.length && e.fieldsContainer.prepend(r({
              text: t
            }))
          };
        $("button", e.fieldsContainer).on("click", (function(r) {
          var i = $("#method").val();
          if (t.type != i) return !0;
          n();
          var a = e.fieldsContainer.serializeArray();
          return a.push({
            name: "save",
            value: 1
          }), $.ajax({
            url: e.fieldsContainer.attr("action"),
            data: $.param(a),
            async: !1,
            method: "POST",
            success: function success(e) {
              if ("success" == e.status) {
                var n = {
                    onSuccess: function onSuccess() {
                      window.location.reload()
                    },
                    onError: function onError(t) {
                      o(t.responseMessage)
                    },
                    onCancel: function onCancel() {
                      window.location.reload()
                    }
                  },
                  r = new GeideaApi(e.data.merchant_key, n.onSuccess, n.onError, n.onCancel);
                return r.configurePayment(e.data.payload), r.startPayment(), console.log(e.data.payload), !1
              }
              if ("error" == e.status) return o(e.error && e.error.length ? e.error : t.defaultErrorText), !1
            }
          }), !1
        }))
      },
      initOpenMoney: function initOpenMoney(t) {
        var e = this;
        $("button", e.fieldsContainer).on("click", (function(n) {
          var o = $("#method").val();
          if (t.type != o) return !0;
          var i = null,
            a = e.fieldsContainer.serializeArray();
          a.push({
            name: "save",
            value: 1
          }), $(".alert.alert-danger", e.fieldsContainer).remove(), $.ajax({
            url: e.fieldsContainer.attr("action"),
            data: $.param(a),
            async: !1,
            method: "POST",
            success: function success(t) {
              "success" === t.status ? i = t.data.token : e.fieldsContainer.prepend(r({
                text: t.error
              }))
            }
          }), n.preventDefault(), i ? Layer.checkout({
            token: i,
            accesskey: t.key
          }, (function(t) {
            "captured" == t.status || "created" == t.status || "pending" == t.status || "failed" == t.status || t.status, console.log("Layer response:", t), window.location.reload()
          }), (function(t) {
            console.log("Layer error:", t)
          })) : console.log("Token is empty")
        }))
      },
      initYoucanpay: function initYoucanpay(t) {
        var e = this;
        $("button", e.fieldsContainer).on("click", (function(r) {
          var o = $("#method").val();
          if (t.type != o) return !0;
          var i = e.fieldsContainer.serializeArray();
          i.push({
            name: "save",
            value: 1
          });
          var a = null;
          if ($.ajax({
              url: e.fieldsContainer.attr("action"),
              data: i,
              async: !1,
              method: "POST",
              success: function success(t) {
                return "success" === t.status && (a = t.data), !1
              }
            }), null !== a) {
            var s = n(338)({
                youcanpay_token: a.token,
                youcanpay_sandbox: a.isSandbox ? "1" : "0",
                youcanpay_pubkey: a.public_key
              }),
              l = window.open("", "", "width=600,height=600").document;
            return l.open(), l.write(s), l.close(), !1
          }
        }))
      },
      initCloudpayments: function initCloudpayments(t) {
        var e = this;
        $("button", e.fieldsContainer).on("click", (function(n) {
          var r = $("#method").val();
          if (t.type != r) return !0;
          var o = e.fieldsContainer.serializeArray();
          return o.push({
            name: "save",
            value: !0
          }), $.ajax({
            url: e.fieldsContainer.attr("action"),
            data: $.param(o),
            method: "POST",
            success: function success(t) {
              if ("success" == t.status) {
                ! function pay() {
                  (new cp.CloudPayments).pay("charge", {
                    publicId: t.data.publicId,
                    amount: Number(t.data.amount),
                    currency: t.data.currency,
                    invoiceId: t.data.invoiceId,
                    skin: "mini",
                    email: t.data.email
                  }, {
                    onSuccess: function onSuccess(t) {},
                    onFail: function onFail(e, n) {
                      $.ajax({
                        url: t.data.processingUrl,
                        data: {
                          status: "fail"
                        },
                        method: "POST"
                      })
                    },
                    onComplete: function onComplete(t, e) {}
                  })
                }()
              }
            }
          }), !1
        }))
      }
    };
    customModule.siteAddfunds.responseAuthorizeHandler
  },
  function(module, exports) {
    module.exports = function(obj) {
      var __t, __p = "",
        __j = Array.prototype.join,
        print = function() {
          __p += __j.call(arguments, "")
        };
      with(obj || {}) __p += '<div class="alert alert-dismissible alert-danger ">\n    <button type="button" class="close" data-dismiss="alert">×</button>\n    ' + (null == (__t = text) ? "" : __t) + "\n</div>\n";
      return __p
    }
  },
  function(module, exports) {
    module.exports = function(obj) {
      var __t, __p = "",
        __j = Array.prototype.join,
        print = function() {
          __p += __j.call(arguments, "")
        };
      with(obj || {}) __p += '<input class="fields" name="AddFoundsForm[fields][' + (null == (__t = name) ? "" : __t) + ']" value="' + (null == (__t = value) ? "" : __t) + '" type="hidden" id="field-' + (null == (__t = name) ? "" : __t) + '"/>';
      return __p
    }
  },
  function(module, exports) {
    module.exports = function(obj) {
      var __t, __p = "",
        __j = Array.prototype.join,
        print = function() {
          __p += __j.call(arguments, "")
        };
      with(obj || {}) __p += '<div class="form-group fields" id="order_' + (null == (__t = name) ? "" : __t) + '">\n    <div class="form-group__checkbox">\n        <label class="form-group__checkbox-label">\n            <input name="AddFoundsForm[fields][' + (null == (__t = name) ? "" : __t) + ']" value="0" type="hidden"/>\n            <input name="AddFoundsForm[fields][' + (null == (__t = name) ? "" : __t) + ']" value="1" type="checkbox" id="field-' + (null == (__t = name) ? "" : __t) + '"/>\n            <span class="checkmark"></span>\n        </label>\n        <label for="field-' + (null == (__t = name) ? "" : __t) + '" class="form-group__label-title">\n            ' + (null == (__t = label) ? "" : __t) + "\n        </label>\n    </div>\n</div>";
      return __p
    }
  },
  function(module, exports) {
    module.exports = function(obj) {
      var __t, __p = "",
        __j = Array.prototype.join,
        print = function() {
          __p += __j.call(arguments, "")
        };
      with(obj || {}) __p += '<div class="form-group fields" id="order_' + (null == (__t = name) ? "" : __t) + '">\n    <label class="control-label" for="field-' + (null == (__t = name) ? "" : __t) + '">' + (null == (__t = label) ? "" : __t) + '</label>\n    <select class="form-control" name="AddFoundsForm[fields][' + (null == (__t = name) ? "" : __t) + ']" id="field-' + (null == (__t = name) ? "" : __t) + '">\n        ', _.forEach(options, (function(t, e) {
        __p += '\n        <option value="' + (null == (__t = e) ? "" : __t) + '" ', value == e && (__p += " selected "), __p += ">" + (null == (__t = t) ? "" : __t) + "</option>\n        "
      })), __p += "\n    </select>\n</div>";
      return __p
    }
  },
  function(module, exports) {
    module.exports = function(obj) {
      var __t, __p = "",
        __j = Array.prototype.join,
        print = function() {
          __p += __j.call(arguments, "")
        };
      with(obj || {}) __p += '<style>\n    @keyframes spinner{\n        to{transform:rotate(360deg)}\n    }\n    .spinner-block__inline{display:inline-block}\n    .spinner-block__container{display:block;width:100%;height:558px}\n    .spinner-block__wrapper{position:relative;display:flex;align-items:center;justify-content:center}\n    .spinner-block__small{width:16px;height:16px}\n    .spinner-block__small span{font-size:14px}\n    .spinner-block__medium{width:24px;height:24px}\n    .spinner-block__medium span{font-size:24px}\n    .spinner-block__high{width:42px;height:42px}\n    .spinner-block__high span{font-size:42px}\n    .spinner-block__wrapper span{animation:spinner .6s linear infinite}\n    #qr-code-container img{margin: auto}\n</style>\n<div class="modal fade" tabindex="-1" role="dialog" id="qr-modal" data-backdrop="static">\n    <div class="modal-dialog" role="document">\n        <form class="modal-content">\n            <div class="modal-body">\n                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>\n                <div class="text-center">\n                    <div class="spinner-block__wrapper spinner-block__container" id="qr-modal-spinner">\n                        <div class="spinner-block__wrapper spinner-block__high">\n                            <span class="fal fa-spinner-third"></span>\n                        </div>\n                    </div>\n\n                    <div class="center-block" id="qr-code-container"></div>\n                </div>\n            </div>\n            <div class="modal-footer">\n                <button type="button" class="btn btn-default btn-big-secondary" data-dismiss="modal">' + (null == (__t = close_title) ? "" : __t) + "</button>\n            </div>\n        </form>\n    </div>\n</div>";
      return __p
    }
  },
  function(module, exports) {
    module.exports = function(obj) {
      var __t, __p = "",
        __j = Array.prototype.join,
        print = function() {
          __p += __j.call(arguments, "")
        };
      with(obj || {}) __p += '<style>\n    @keyframes spinner{\n        to{transform:rotate(360deg)}\n    }\n    .spinner-block__inline{display:inline-block}\n    .spinner-block__container{display:block;width:100%;height:558px}\n    .spinner-block__wrapper{position:relative;display:flex;align-items:center;justify-content:center}\n    .spinner-block__small{width:16px;height:16px}\n    .spinner-block__small span{font-size:14px}\n    .spinner-block__medium{width:24px;height:24px}\n    .spinner-block__medium span{font-size:24px}\n    .spinner-block__high{width:42px;height:42px}\n    .spinner-block__high span{font-size:42px}\n    .spinner-block__wrapper span{animation:spinner .6s linear infinite}\n</style>\n<div class="modal fade" tabindex="-1" role="dialog" id="qr-modal" data-backdrop="static">\n    <div class="modal-dialog" role="document">\n        <form class="modal-content">\n            <div class="modal-body">\n                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>\n                <div class="text-center">\n                    <div class="spinner-block__wrapper spinner-block__container" id="qr-modal-spinner">\n                        <div class="spinner-block__wrapper spinner-block__high">\n                            <span class="fal fa-spinner-third"></span>\n                        </div>\n                    </div>\n                    <img alt="" class="img-responsive center-block m-auto" id="qr-code-image">\n                </div>\n\n                <p>' + (null == (__t = instruction) ? "" : __t) + '</p>\n                <div class="form-group">\n                    <textarea id="qr-code-value" readonly class="form-control">\n\n                        </textarea>\n                </div>\n\n                <button type="button" class="btn btn-primary" id="qr-code-copy-button"><span class="fas fa-clone"></span></button>\n            </div>\n            <div class="modal-footer">\n                <button type="button" class="btn btn-default btn-big-secondary" data-dismiss="modal">' + (null == (__t = close_title) ? "" : __t) + "</button>\n            </div>\n        </form>\n    </div>\n</div>";
      return __p
    }
  },
  function(module, exports) {
    module.exports = function(obj) {
      var __t, __p = "",
        __j = Array.prototype.join,
        print = function() {
          __p += __j.call(arguments, "")
        };
      with(obj || {}) __p += '<div class="modal fade" id="sumupCardModal" data-backdrop="static" tabindex="-1" role="dialog">\n    <div class="modal-dialog" role="document">\n        <div class="modal-content">\n            <div class="modal-header">\n                <button type="button" class="close" data-dismiss="modal" aria-label="' + (null == (__t = modal_close) ? "" : __t) + '">\n                    <span aria-hidden="true">&times;</span>\n                </button>\n                <h4 class="modal-title">' + (null == (__t = modal_title) ? "" : __t) + '</h4>\n            </div>\n\n            <div class="modal-body" id="sumup-card">\n            </div>\n\n        </div>\n    </div>\n</div>\n';
      return __p
    }
  },
  function(module, exports) {
    module.exports = function(obj) {
      var __t, __p = "",
        __j = Array.prototype.join,
        print = function() {
          __p += __j.call(arguments, "")
        };
      with(obj || {}) __p += '<div class="modal fade" id="STCPayOtpFormModal" data-backdrop="static" tabindex="-1" role="dialog">\n    <div class="modal-dialog" role="document">\n        <div class="modal-content">\n            <div class="modal-header">\n                <button type="button" class="close" data-dismiss="modal" aria-label="' + (null == (__t = close_title) ? "" : __t) + '">\n                    <span aria-hidden="true">&times;</span>\n                </button>\n                <h4 class="modal-title">' + (null == (__t = modal_title) ? "" : __t) + '</h4>\n            </div>\n\n            <div class="modal-body">\n                <form action="" method="POST" id="STCPayOtpForm">\n                    <input type="hidden" name="otp_ref" value="">\n                    <input type="hidden" name="pmt_ref" value="">\n\n                    <div class="form-group">\n                        <label class="control-label" for="otp-token-field">' + (null == (__t = otp_title) ? "" : __t) + '</label>\n                        <input id="otp-token-field" class="form-control" name="otp_token" autocomplete="off" />\n                    </div>\n\n                    <div id="error"></div>\n\n                    <div class="modal-footer">\n                        <button type="submit" class="btn btn-primary btn-big-primary">\n                            ' + (null == (__t = submit_title) ? "" : __t) + '\n                        </button>\n                        <button type="button" class="btn btn-default btn-big-secondary" data-dismiss="modal">\n                            ' + (null == (__t = cancel_title) ? "" : __t) + "\n                        </button>\n                    </div>\n\n                </form>\n            </div>\n\n        </div>\n    </div>\n</div>\n";
      return __p
    }
  },
  function(module, exports) {
    module.exports = function(obj) {
      var __t, __p = "",
        __j = Array.prototype.join,
        print = function() {
          __p += __j.call(arguments, "")
        };
      with(obj || {}) __p += '<div class="form-group">\n    <label class="control-label" >' + (null == (__t = label) ? "" : __t) + '</label>\n    <div id="stripe-card-element" ></div>\n</div>';
      return __p
    }
  },
  function(module, exports) {
    module.exports = function(obj) {
      var __t, __p = "",
        __j = Array.prototype.join,
        print = function() {
          __p += __j.call(arguments, "")
        };
      with(obj || {}) __p += '<span id="' + (null == (__t = id) ? "" : __t) + '" style="width: 150px; height: 18px; display: inline-block;" class="hidden"></span>';
      return __p
    }
  },
  function(module, exports) {
    module.exports = function(obj) {
      var __t, __p = "",
        __j = Array.prototype.join,
        print = function() {
          __p += __j.call(arguments, "")
        };
      with(obj || {}) __p += '<div class="form-group" style="position: relative;">\n    <label class="control-label">' + (null == (__t = label) ? "" : __t) + '</label>\n    <div id="stripe-iban-element" class="form-control"></div>\n    <div id="stripe-iban-bank-name" style="position: absolute; right: 10px; margin-top: -30px; opacity: 0.8; z-index: 1;"></div>\n</div>\n';
      return __p
    }
  },
  function(module, exports) {
    module.exports = function(obj) {
      var __t, __p = "",
        __j = Array.prototype.join,
        print = function() {
          __p += __j.call(arguments, "")
        };
      with(obj || {}) __p += '<div class="modal fade" id="squareupCardModal" data-backdrop="static" tabindex="-1" role="dialog">\n    <div class="modal-dialog" role="document">\n        <div class="modal-content">\n            <div class="modal-header">\n                <button type="button" class="close" data-dismiss="modal" aria-label="' + (null == (__t = modal_title) ? "" : __t) + '">\n                    <span aria-hidden="true">&times;</span>\n                </button>\n                <h4 class="modal-title">' + (null == (__t = modal_title) ? "" : __t) + '</h4>\n            </div>\n\n            <div id="form-container">\n                <div id="sq-ccbox">\n                    \x3c!--\n                      Be sure to replace the action attribute of the form with the path of\n                      the Transaction API charge endpoint URL you want to POST the nonce to\n                      (for example, "/process-card")\n                    --\x3e\n                    <form id="nonce-form" novalidate>\n                        <div class="modal-body">\n\n                            <div id="card-error-container" class="error-summary alert alert-danger hidden"></div>\n\n                            <fieldset>\n                                <div class="form-group">\n                                    <label class="control-label" for="sq-card-number">' + (null == (__t = card_number) ? "" : __t) + '</label>\n                                    <div id="sq-card-number" class="form-control"></div>\n                                </div>\n                                <div class="form-group">\n                                    <label class="control-label" for="sq-expiration-date">' + (null == (__t = expiration_date) ? "" : __t) + '</label>\n                                    <div id="sq-expiration-date" class="form-control"></div>\n                                </div>\n                                <div class="form-group">\n                                    <label class="control-label" for="sq-cvv">' + (null == (__t = cvv) ? "" : __t) + '</label>\n                                    <div id="sq-cvv" class="form-control"></div>\n                                </div>\n                                <div class="form-group">\n                                    <label class="control-label" for="sq-postal-code">' + (null == (__t = postal_code) ? "" : __t) + '</label>\n                                    <div id="sq-postal-code" class="form-control"></div>\n                                </div>\n                            </fieldset>\n\n                            <div id="error"></div>\n                            \x3c!--\n                              After a nonce is generated it will be assigned to this hidden input field.\n                            --\x3e\n                            <input type="hidden" id="card-nonce" name="nonce">\n                        </div>\n\n                        <div class="modal-footer">\n                            <button id="sq-creditcard" type="submit" class="button-credit-card btn btn-primary btn-big-primary">\n                                ' + (null == (__t = submit_title) ? "" : __t) + '\n                            </button>\n                            <button type="button" class="btn btn-default btn-big-secondary" data-dismiss="modal">\n                                ' + (null == (__t = cancel_title) ? "" : __t) + "\n                            </button>\n                        </div>\n\n                    </form>\n                </div> \x3c!-- end #sq-ccbox --\x3e\n            </div> \x3c!-- end #form-container --\x3e\n\n        </div>\n    </div>\n</div>\n";
      return __p
    }
  },
  function(module, exports) {
    module.exports = function(obj) {
      var __t, __p = "",
        __j = Array.prototype.join,
        print = function() {
          __p += __j.call(arguments, "")
        };
      with(obj || {}) __p += '<div class="modal fade" id="checkoutcomCardModal" data-backdrop="static" tabindex="-1" role="dialog">\n    <div class="modal-dialog" role="document">\n        <div class="modal-content">\n            <div class="modal-header">\n                <button type="button" class="close" data-dismiss="modal" aria-label="' + (null == (__t = modal_title) ? "" : __t) + '">\n                    <span aria-hidden="true">&times;</span>\n                </button>\n                <h4 class="modal-title">' + (null == (__t = modal_title) ? "" : __t) + '</h4>\n            </div>\n            <form method="POST">\n                <div class="modal-body">\n                    <div class="frames-container">\n                        \x3c!-- form will be added here --\x3e\n                    </div>\n                    \x3c!-- add submit button --\x3e\n                </div>\n                <div class="modal-footer">\n                    <button type="submit" class="button-credit-card btn btn-primary">\n                        ' + (null == (__t = submit_title) ? "" : __t) + '\n                    </button>\n                    <button type="button" class="btn btn-default btn-big-secondary" data-dismiss="modal">\n                        ' + (null == (__t = cancel_title) ? "" : __t) + "\n                    </button>\n                </div>\n            </form>\n        </div>\n    </div>\n</div>\n";
      return __p
    }
  },
  function(module, exports) {
    module.exports = function(obj) {
      var __t, __p = "",
        __j = Array.prototype.join,
        print = function() {
          __p += __j.call(arguments, "")
        };
      with(obj || {}) __p += '<style>\n    @keyframes spinner{\n        to{transform:rotate(360deg)}\n    }\n    .spinner-block__inline{display:inline-block}\n    .spinner-block__container{display:block;width:100%;height:558px}\n    .spinner-block__wrapper{position:relative;display:flex;align-items:center;justify-content:center}\n    .spinner-block__small{width:16px;height:16px}\n    .spinner-block__small span{font-size:14px}\n    .spinner-block__medium{width:24px;height:24px}\n    .spinner-block__medium span{font-size:24px}\n    .spinner-block__high{width:42px;height:42px}\n    .spinner-block__high span{font-size:42px}\n    .spinner-block__wrapper span{animation:spinner .6s linear infinite}\n</style>\n<div class="modal fade" tabindex="-1" role="dialog" id="qr-modal" data-backdrop="static">\n    <div class="modal-dialog" role="document">\n        <form class="modal-content">\n            <div class="modal-body">\n                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>\n                <div class="text-center">\n                    <div class="spinner-block__wrapper spinner-block__container" id="qr-modal-spinner">\n                        <div class="spinner-block__wrapper spinner-block__high">\n                            <span class="fal fa-spinner-third"></span>\n                        </div>\n                    </div>\n                    <img alt="" class="img-responsive center-block" id="qr-code-image">\n                </div>\n            </div>\n            <div class="modal-footer">\n                <button type="button" class="btn btn-default btn-big-secondary" data-dismiss="modal">' + (null == (__t = close_title) ? "" : __t) + "</button>\n            </div>\n        </form>\n    </div>\n</div>";
      return __p
    }
  },
  function(module, exports) {
    module.exports = function(obj) {
      var __t, __p = "",
        __j = Array.prototype.join,
        print = function() {
          __p += __j.call(arguments, "")
        };
      with(obj || {}) __p += '<style>\n    @keyframes spinner{\n        to{transform:rotate(360deg)}\n    }\n    .spinner-block__inline{display:inline-block}\n    .spinner-block__container{display:block;width:100%;height:558px}\n    .spinner-block__wrapper{position:relative;display:flex;align-items:center;justify-content:center}\n    .spinner-block__small{width:16px;height:16px}\n    .spinner-block__small span{font-size:14px}\n    .spinner-block__medium{width:24px;height:24px}\n    .spinner-block__medium span{font-size:24px}\n    .spinner-block__high{width:42px;height:42px}\n    .spinner-block__high span{font-size:42px}\n    .spinner-block__wrapper span{animation:spinner .6s linear infinite}\n</style>\n<div class="modal fade" id="gbPrimePay3dsCardModal" data-backdrop="static" tabindex="-1" role="dialog">\n    <div class="modal-dialog" role="document">\n        <div class="modal-content">\n            <div class="modal-header">\n                <button type="button" class="close" data-dismiss="modal" aria-label="' + (null == (__t = modal_title) ? "" : __t) + '">\n                    <span aria-hidden="true">&times;</span>\n                </button>\n                <h4 class="modal-title">' + (null == (__t = modal_title) ? "" : __t) + '</h4>\n            </div>\n            <div class="modal-body">\n                    <div id="gb-form" style="height: 558px;">\n                        <div class="spinner-block__wrapper spinner-block__container" id="gb-modal-spinner">\n                            <div class="spinner-block__wrapper spinner-block__high">\n                                <span class="fal fa-spinner-third"></span>\n                            </div>\n                        </div>\n                    </div>\n            </div>\n            <div class="modal-footer">\n                <button type="button" class="btn btn-default btn-big-secondary" data-dismiss="modal">' + (null == (__t = close_title) ? "" : __t) + "</button>\n            </div>\n        </div>\n    </div>\n</div>\n";
      return __p
    }
  },
  function(module, exports) {
    module.exports = function(obj) {
      var __t, __p = "",
        __j = Array.prototype.join,
        print = function() {
          __p += __j.call(arguments, "")
        };
      with(obj || {}) __p += '<div class="modal fade" id="adyenModal" data-backdrop="static" tabindex="-1" role="dialog">\n    <div class="modal-dialog" role="document">\n        <div class="modal-content">\n            <div class="modal-header">\n                <button type="button" class="close" data-dismiss="modal" aria-label="' + (null == (__t = modal_title) ? "" : __t) + '">\n                    <span aria-hidden="true">&times;</span>\n                </button>\n                <h4 class="modal-title">' + (null == (__t = modal_title) ? "" : __t) + '</h4>\n            </div>\n            <div class="modal-body">\n                <div id="dropin-container"></div>\n            </div>\n        </div>\n    </div>\n</div>\n';
      return __p
    }
  },
  function(module, exports) {
    module.exports = function(obj) {
      var __t, __p = "",
        __j = Array.prototype.join,
        print = function() {
          __p += __j.call(arguments, "")
        };
      with(obj || {}) __p += '<div class="modal fade" id="shopinextCardModal" data-backdrop="static" tabindex="-1" role="dialog">\n    <div class="modal-dialog" role="document">\n        <div class="modal-content">\n            <div class="modal-header">\n                <button type="button" class="close" data-dismiss="modal" aria-label="' + (null == (__t = modal_title) ? "" : __t) + '">\n                    <span aria-hidden="true">&times;</span>\n                </button>\n                <h4 class="modal-title">' + (null == (__t = modal_title) ? "" : __t) + '</h4>\n            </div>\n\n            <div class="modal-body">\n                <form action="" method="POST" id="shopinextCardForm">\n                    <div id="card-error-container" class="error-summary alert alert-danger hidden"></div>\n\n                    <div class="form-group">\n                        <label class="control-label" for="card-name">' + (null == (__t = card_name) ? "" : __t) + '</label>\n                        <input id="card-name" class="form-control" name="name" autocomplete="off" maxlength="32" />\n                    </div>\n                    <div class="form-group">\n                        <label class="control-label" for="card-number">' + (null == (__t = card_number) ? "" : __t) + '</label>\n                        <input id="card-number" class="form-control" name="number" autocomplete="off" maxlength="19" />\n                    </div>\n                    <div class="form-group">\n                        <label class="control-label" for="expiration-month">' + (null == (__t = expiry_month) ? "" : __t) + '</label>\n                        <input id="expiration-month" class="form-control" name="month" autocomplete="off" maxlength="2">\n                    </div>\n                    <div class="form-group">\n                        <label class="control-label" for="expiration-year">' + (null == (__t = expiry_year) ? "" : __t) + '</label>\n                        <input id="expiration-year" class="form-control" name="year" autocomplete="off" maxlength="4">\n                    </div>\n                    <div class="form-group">\n                        <label class="control-label" for="cvv">' + (null == (__t = cvv) ? "" : __t) + '</label>\n                        <input id="cvv" class="form-control" name="cvv" autocomplete="off" maxlength="4">\n                    </div>\n\n                    <div id="error"></div>\n\n                    <div class="modal-footer">\n                        <button type="submit" class="button-credit-card btn btn-primary btn-big-primary">\n                            ' + (null == (__t = submit_title) ? "" : __t) + '\n                        </button>\n                        <button type="button" class="btn btn-default btn-big-secondary" data-dismiss="modal">\n                            ' + (null == (__t = cancel_title) ? "" : __t) + "\n                        </button>\n                    </div>\n\n                </form>\n            </div>\n\n        </div>\n    </div>\n</div>\n";
      return __p
    }
  },
  function(module, exports) {
    module.exports = function(obj) {
      var __t, __p = "",
        __j = Array.prototype.join,
        print = function() {
          __p += __j.call(arguments, "")
        };
      with(obj || {}) __p += "<button type='button' id=\"" + (null == (__t = id) ? "" : __t) + '" data-amount="' + (null == (__t = amount) ? "" : __t) + '" data-product="' + (null == (__t = product) ? "" : __t) + '" data-passthrough="' + (null == (__t = passthrough) ? "" : __t) + '" data-currency="' + (null == (__t = currency) ? "" : __t) + '" class="hidden btn cryptochill-button">' + (null == (__t = product) ? "" : __t) + "</button>";
      return __p
    }
  },
  function(module, exports) {
    module.exports = function(obj) {
      var __t, __p = "",
        __j = Array.prototype.join,
        print = function() {
          __p += __j.call(arguments, "")
        };
      with(obj || {}) __p += '<script src="https://youcanpay.com/js/ycpay.js"><\/script>\n\n<input type="hidden" id="youcanpay-token" value="' + (null == (__t = youcanpay_token) ? "" : __t) + '">\n<input type="hidden" id="youcanpay-sandbox" value="' + (null == (__t = youcanpay_sandbox) ? "" : __t) + '">\n<input type="hidden" id="youcanpay-pubkey" value="' + (null == (__t = youcanpay_pubkey) ? "" : __t) + "\">\n\n<div id=\"youcanpay-error-container\"></div>\n<div id=\"youcanpay-payment-container\"></div>\n<button id=\"youcanpay-pay-button\">Pay</button>\n\n<script>\n    const token = document.getElementById('youcanpay-token').value;\n    const sandbox = document.getElementById('youcanpay-sandbox').value == 1;\n    const pubkey = document.getElementById('youcanpay-pubkey').value;\n\n    const ycPay = new YCPay(pubkey, {\n        formContainer: '#youcanpay-payment-container',\n        locale: 'en',\n        isSandbox: sandbox,\n        errorContainer: '#youcanpay-error-container',\n    });\n\n    ycPay.renderAvailableGateways();\n    document.getElementById('youcanpay-pay-button').addEventListener('click', function() {\n        ycPay.pay(token)\n            .then(function() {\n                window.close();\n            })\n            .catch(function(err) {\n                document.getElementById('youcanpay-pay-button').disabled = true;\n            });\n    });\n<\/script>\n";
      return __p
    }
  },
  function(t, e) {
    customModule.api = {
      run: function run(t) {
        $("#service_type").length || $('div[id^="type_"]').show(), $("#service_type").change((function() {
          $("div[id^='type_']").hide();
          var t = $("#service_type").val();
          $("#type_" + t).show()
        })), $("#service_type").trigger("change")
      }
    }
  },
  function(t, e) {
    customModule.siteOrder = {
      run: function run(t) {
        document.forms.sendform.submit()
      }
    }
  },
  function(t, e) {
    customModule.siteChildPanels = {
      run: function run(t) {
        $("#child-panels-renew, #child-panels-restore").click((function(t) {
          t.preventDefault(), $(this).addClass("disabled").prop("disabled", !0), location.href = $(this).attr("href")
        }))
      }
    }
  },
  function(t, e) {
    customModule.confirmEmail = {
      run: function run(t) {
        var e = $("#changeEmailModal"),
          n = $("#changeEmailForm");
        n.attr("action", t.change_email_url), $("#changeEmailLink").on("click", (function(t) {
          return t.preventDefault(), $("#new-email, #current-password", n).val(""), e.modal("show"), !1
        })), n.on("submit", (function(t) {
          t.preventDefault();
          var e = $("#changeEmailSubmitBtn", n);
          return custom.sendFrom(e, n, {
            data: n.serialize(),
            callback: function callback() {
              location.reload()
            }
          }), !1
        }))
      }
    }
  },
  function(t, e) {
    customModule.siteHistory = {
      run: function run(t) {
        $("#setRefill").on("show.bs.modal", (function(t) {
          $("#refill_loader").show(), $("#refill_body").html("");
          var e = $(this),
            n = $("form", e);
          $('input[name="id"]', n).val($(t.relatedTarget).data("href")), $.post(n.attr("action"), n.serialize(), (function(t) {
            if ("success" == t.status) return location.reload(), !1;
            "error" == t.status && ($("#refill_loader").hide(), $("#refill_body").html(t.error))
          }))
        }))
      }
    }
  },
  function(t, e, n) {
    function _typeof(t) {
      return (_typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function(t) {
        return typeof t
      } : function(t) {
        return t && "function" == typeof Symbol && t.constructor === Symbol && t !== Symbol.prototype ? "symbol" : typeof t
      })(t)
    }
    customModule.siteOrder = {
      fieldsOptions: void 0,
      fieldsContainer: void 0,
      services: [],
      fields: [],
      maxQuantity: 0,
      run: function run(t) {
        var e, n, r, o = this;
        o.services = $.extend({}, !0, t.services), o.fields = $.extend({}, !0, t.fields), o.currencyOptions = $.extend({}, !0, t.currency), o.format = $.extend({}, !0, t.format), o.fieldsContainer = $("#fields"), o.fieldOptions = t.fieldOptions, $(document).on("change", "#orderform-category", (function() {
          var t = $(this).val();
          o.updateServices(t), $("#orderform-service").trigger("change")
        })), $(document).on("change", "#orderform-service", (function() {
          var t = $(this),
            e = $("option:selected", t).data("type"),
            n = $("option:selected", t).val(),
            r = o.services[n].link_type;
          o.updateFields(e, !0, r), o.updateDescription(), o.updateQuantityHelpBlock(), o.updateAverageTime()
        })), $(document).on("keyup", ".counter", (function() {
          var t = $(this),
            e = $("input, textarea", $("#order_" + t.data("related") + ".fields")),
            n = 0;
          e.length && $.each(t.val().split("\n"), (function(t, e) {
            $.trim(e).length > 0 && n++
          })), e.val(n), o.updateCharge()
        })), $(document).on("change", "#field-orderform-fields-check", (function() {
          var t = $(this),
            e = t.attr("id"),
            n = $('.depend-fields[data-depend="' + e + '"]');
          t.prop("checked") ? n.removeClass("hidden") : n.addClass("hidden"), o.updateTotalQuantity()
        })), $(document).on("keyup", "#field-orderform-fields-quantity", (function() {
          o.updateCharge()
        })), $(document).on("keyup", "#field-orderform-fields-quantity, #field-orderform-fields-runs", (function() {
          o.updateTotalQuantity()
        })), $(document).on("click", ".clear-datetime", (function() {
          var t = $(this).data("rel");
          $(t).val("")
        })), $("#orderform-category").length ? $("#orderform-category").trigger("change") : o.updateServices(), o.initFields(), e = $("#orderform-service"), n = $("option:selected", e).data("type"), r = $("#orderform-service").val(), void 0 !== n ? o.updateFields(n, !1, o.services[r].link_type) : o.updateFields(0, !1, 0), o.updateCharge(), o.updateDescription(), o.updateAverageTime(), o.updateQuantityHelpBlock(), $("#field-orderform-fields-check").trigger("change")
      },
      getMaxQuantityValue: function getMaxQuantityValue() {
        var t = this.getServicePriceByOrigin(!1);
        return 0 >= t ? Number.MAX_SAFE_INTEGER : parseInt(Number.MAX_SAFE_INTEGER - 1 / t)
      },
      preparePrice: function preparePrice(t, e) {
        var n = this.format,
          r = n.min;
        t = this.toFixed(t);
        var o = (t = $.trim(t.toString().replace(",", "."))).split(".");
        void 0 !== o[1] && (o[1] = o[1].replace(/0+$/g, ""), o[1].length > r && (r = n.max < o[1].length ? n.max : o[1].length)), 1e3 <= (t = (t = parseFloat(t)).toFixed(r)) && (t = t.replace(/(\d)(?=(\d\d\d)+([^\d]|$))/g, "$1" + n.thousands)), t = t.replace(/\.(\d+)$/g, n.delimiter + "$1");
        var i = this.currencyOptions;
        return t = e ? i.original_template.replace("{{value}}", t) : i.template.replace("{{value}}", t)
      },
      getServicePriceByOrigin: function getServicePriceByOrigin(t) {
        var e = $("#orderform-service"),
          n = this.services[e.val()];
        if (!n) return 0;
        var r = t ? n.orig_price : n.price;
        return parseFloat(r)
      },
      getCurrentServiceType: function getCurrentServiceType() {
        var t = $("#orderform-service"),
          e = this.services[t.val()];
        return e ? e.type : 0
      },
      updateTotalQuantity: function updateTotalQuantity() {
        var t, e = $("#field-orderform-fields-quantity"),
          n = $("#field-orderform-fields-runs"),
          r = $("#field-orderform-fields-total-quantity");
        t = 1 * e.val() * (1 * n.val()), r.val(t), this.updateCharge()
      },
      updateCharge: function updateCharge() {
        var t = $("#charge"),
          e = t.parent(".form-group"),
          n = $("#field-orderform-fields-quantity"),
          r = $("#orderform-service"),
          o = this.getMaxQuantityValue(),
          i = this.currencyOptions.converted;
        if (e.show(), i && $(t).tooltip(), t.val(this.preparePrice(0)), this.services[r.val()]) {
          var a = this.getServicePriceByOrigin(!1),
            s = this.getServicePriceByOrigin(!0),
            l = 1 * this.getCurrentServiceType();
          if (10 == l || 14 == l || 16 == l) return t.val(this.preparePrice(a)), void(i && $(t).attr("data-original-title", this.preparePrice(s, !0)));
          if (100 != l) {
            12 == l && $("#field-orderform-fields-check").prop("checked") && (n = $("#field-orderform-fields-total-quantity"));
            var c = $.trim(n.val());
            if (!c || "" == c || !c.length || isNaN(c) || !c.match(/^\d+$/gi)) return t.val(""), void(i && $(t).attr("data-original-title", ""));
            if (c = parseInt(c), isNaN(c)) return t.val(""), void(i && $(t).attr("data-original-title", ""));
            o < c && (c = o), a *= c, a /= 1e3, s = s * c / 1e3, t.val(this.preparePrice(a)), i && $(t).attr("data-original-title", this.preparePrice(s, !0))
          } else e.hide()
        }
      },
      toFixed: function toFixed(t) {
        var e;
        Math.abs(t) < 1 ? (e = parseInt(t.toString().split("e-")[1])) && (t *= Math.pow(10, e - 1), t = "0." + new Array(e).join("0") + t.toString().substring(2)) : (e = parseInt(t.toString().split("+")[1])) > 20 && (e -= 20, t /= Math.pow(10, e), t += new Array(e + 1).join("0"));
        return t
      },
      updateServices: function updateServices(t) {
        var e = $("#orderform-service"),
          n = [],
          r = void 0;
        void 0 !== this.fieldOptions && void 0 !== this.fieldOptions.data && void 0 !== this.fieldOptions.data.service && (r = this.fieldOptions.data.service), e.html(""), $.each(this.services, (function(e, r) {
          void 0 !== t && t != r.cid || n.push(r)
        })), n.sort((function(t, e) {
          var n = parseInt(t.position),
            r = parseInt(e.position);
          return n < r ? -1 : n > r ? 1 : 0
        }));
        var o = void 0,
          i = $("select[name='OrderForm[service]']").data("select");
        $.each(n, (function(t, n) {
          if (o = $("<option></option>").attr("data-type", n.type).attr("value", n.id).text(n.name), r == n.id && o.attr("selected", "selected"), i && n.hasOwnProperty("name_template") && "object" === _typeof(n.name_template)) {
            var a = n.name_template;
            a.hasOwnProperty("template") && o.attr("data-template", a.template), a.hasOwnProperty("service_id") && o.attr("data-id", a.service_id), a.hasOwnProperty("service_name") && o.attr("data-name", a.service_name)
          }
          e.append(o)
        }))
      },
      updateFields: function updateFields(t, e, n) {
        var r = this,
          o = $('.fields input[type="text"], .fields textarea, .depend-fields input[type="text"], .depend-fields textarea');
        if (o.prop("disabled", !1), o.removeAttr("data-related"), o.removeClass("counter"), $(".fields, .depend-fields").addClass("hidden"), void 0 !== r.fields[t]) {
          $.each(r.fields[t], (function(t, e) {
            var o = $("#order_" + e.name + ".fields"),
              i = $("input, textarea", o),
              a = $("label", o);
            "old_posts" == e.name && "2" != n && "1" != n || ("username" == e.name && ("7" == n ? a.html(r.fieldOptions.label.channel_id) : "8" == n ? a.html(r.fieldOptions.label.link) : a.html(r.fieldOptions.label.username)), void 0 !== e.disabled && e.disabled && (i.prop("disabled", !0), $("input, textarea", $("#order_" + e.related + ".fields")).attr("data-related", e.name).addClass("counter").trigger("keyup")), o.removeClass("hidden"), o.hasClass("has-depends") && i.trigger("change"))
          })), void 0 !== e && e && (o.val(""), $('.fields input[type="checkbox"]').prop("checked", !1)), r.updateCharge(), r.initDatetime();
          try {
            $('[data-toggle="tooltip"]').tooltip()
          } catch (t) {
            console.log("Error with tooltip. Catch", t)
          }
        }
      },
      updateAverageTime: function updateAverageTime() {
        var t = $("#orderform-service"),
          e = this.services[t.val()],
          n = $("#field-orderform-fields-average_time"),
          r = $("#order_average_time");
        n.addClass("hidden"), r.hide(), void 0 !== e && "string" == typeof e.average_time && e.average_time.length && /\d/.test(e.average_time) && (n.val(e.average_time), n.removeClass("hidden"), r.show())
      },
      updateDescription: function updateDescription() {
        var t = $("#orderform-service"),
          e = this.services[t.val()],
          n = $("#service_description"),
          r = $("div", n);
        r.html(""), n.addClass("hidden"), void 0 !== e && "string" == typeof e.description && e.description.length && (r.html(e.description), n.removeClass("hidden"))
      },
      updateQuantityHelpBlock: function updateQuantityHelpBlock() {
        var t, e = $("#orderform-service"),
          n = this.services[e.val()],
          r = $("#order_quantity"),
          o = $("#order_min");
        $(".min-max", r).remove(), $(".min-max", o).remove(), void 0 !== n && n.min_max_label && n.min_max_label.length && (t = '<small class="help-block min-max">' + n.min_max_label + "</small>", $("#field-orderform-fields-quantity", r).after(t), $("#order_count", o).after(t))
      },
      initFields: function initFields() {
        var t = this,
          e = t.fieldOptions.fields,
          r = "";
        t.fieldsContainer.html("");
        var o = [];
        $.each(e, (function(e, i) {
          try {
            r = n(345)("./order_" + i + ".html")
          } catch (t) {
            r = null
          }
          "function" == typeof r && o.push(r(t.fieldOptions))
        })), t.fieldsContainer.html(o.join("\r\n")), t.initDatetime()
      },
      initDatetime: function initDatetime() {
        $(".datetime").length && $(".datetime").datetimepicker({
          format: "DD/MM/YYYY",
          minDate: new Date,
          useCurrent: !1,
          icons: {
            previous: "fa fa-chevron-left",
            next: "fa fa-chevron-right"
          },
          widgetPositioning: {
            horizontal: "auto",
            vertical: $("body.body").length ? "top" : "auto"
          }
        })
      }
    }
  },
  function(t, e, n) {
    var r = {
      "./order_answer_number.html": 346,
      "./order_average_time.html": 347,
      "./order_comment.html": 348,
      "./order_comment_username.html": 349,
      "./order_delay.html": 350,
      "./order_dripfeed.html": 351,
      "./order_email.html": 352,
      "./order_groups.html": 353,
      "./order_hashtag.html": 354,
      "./order_hashtags.html": 355,
      "./order_keywords.html": 356,
      "./order_link.html": 357,
      "./order_media_url.html": 358,
      "./order_mention_usernames.html": 359,
      "./order_min.html": 360,
      "./order_old_posts.html": 361,
      "./order_posts.html": 362,
      "./order_quantity.html": 363,
      "./order_user_name.html": 364,
      "./order_username.html": 365,
      "./order_usernames.html": 366,
      "./order_usernames_custom.html": 367
    };

    function webpackContext(t) {
      var e = webpackContextResolve(t);
      return n(e)
    }

    function webpackContextResolve(t) {
      if (!n.o(r, t)) {
        var e = new Error("Cannot find module '" + t + "'");
        throw e.code = "MODULE_NOT_FOUND", e
      }
      return r[t]
    }
    webpackContext.keys = function webpackContextKeys() {
      return Object.keys(r)
    }, webpackContext.resolve = webpackContextResolve, t.exports = webpackContext, webpackContext.id = 345
  },
  function(module, exports) {
    module.exports = function(obj) {
      var __t, __p = "",
        __j = Array.prototype.join,
        print = function() {
          __p += __j.call(arguments, "")
        };
      with(obj || {}) __p += '<div class="form-group hidden fields" id="order_answer_number">\n    <label class="control-label" for="field-orderform-fields-answer_number">' + (null == (__t = label.answer_number) ? "" : __t) + '</label>\n    <input class="form-control" name="OrderForm[answer_number]" value="' + (null == (__t = data.answer_number) ? "" : __t) + '" type="text" id="field-orderform-fields-answer_number"/>\n</div>';
      return __p
    }
  },
  function(module, exports) {
    module.exports = function(obj) {
      var __t, __p = "",
        __j = Array.prototype.join,
        print = function() {
          __p += __j.call(arguments, "")
        };
      with(obj || {}) __p += '<div class="form-group hidden fields" id="order_average_time">\n    <label class="control-label" for="field-orderform-fields-average_time">' + (null == (__t = label.average_time) ? "" : __t) + '\n        <span class="ml-1 mr-1 fa fa-exclamation-circle" data-toggle="tooltip" data-placement="right"\n              title="' + (null == (__t = tooltips.average_time) ? "" : __t) + '">\n        </span>\n    </label>\n    <input class="form-control" readonly value="" type="text" id="field-orderform-fields-average_time"/>\n</div>';
      return __p
    }
  },
  function(module, exports) {
    module.exports = function(obj) {
      var __t, __p = "",
        __j = Array.prototype.join,
        print = function() {
          __p += __j.call(arguments, "")
        };
      with(obj || {}) __p += '<div class="form-group hidden fields" id="order_comment">\n    <label class="control-label" for="field-orderform-fields-comment">' + (null == (__t = label.comments) ? "" : __t) + '</label>\n    <textarea class="form-control" name="OrderForm[comment]" id="field-orderform-fields-comment" cols="30" rows="10">' + (null == (__t = data.comment) ? "" : __t) + "</textarea>\n</div>";
      return __p
    }
  },
  function(module, exports) {
    module.exports = function(obj) {
      var __t, __p = "",
        __j = Array.prototype.join,
        print = function() {
          __p += __j.call(arguments, "")
        };
      with(obj || {}) __p += '<div class="form-group hidden fields" id="order_comment_username">\n    <label class="control-label" for="field-orderform-fields-comment_username">' + (null == (__t = label.comment_username) ? "" : __t) + '</label>\n    <input class="form-control" name="OrderForm[comment_username]" value="' + (null == (__t = data.username) ? "" : __t) + '" type="text" id="field-orderform-fields-comment_username"/>\n</div>';
      return __p
    }
  },
  function(module, exports) {
    module.exports = function(obj) {
      var __t, __p = "",
        __j = Array.prototype.join,
        print = function() {
          __p += __j.call(arguments, "")
        };
      with(obj || {}) __p += '<div class="form-group hidden fields" id="order_delay">\n    <div class="row">\n        <div class="col-md-6">\n            <label class="control-label" for="field-orderform-fields-delay">' + (null == (__t = label.delay) ? "" : __t) + '</label>\n            <select class="form-control" name="OrderForm[delay]" id="field-orderform-fields-delay">\n                ', _.forEach(delays, (function(t, e) {
        __p += '\n                <option value="' + (null == (__t = e) ? "" : __t) + '" ', e == data.delay && (__p += " selected "), __p += ">" + (null == (__t = t) ? "" : __t) + "</option>\n                "
      })), __p += '\n            </select>\n        </div>\n        <div class="col-md-6">\n            <label for="field-orderform-fields-expiry">' + (null == (__t = label.expiry) ? "" : __t) + '</label>\n            <div class="input-group">\n                <input class="form-control datetime" autocomplete="off" name="OrderForm[expiry]" value="' + (null == (__t = data.expiry) ? "" : __t) + '" type="text" id="field-orderform-fields-expiry"/>\n                <span class="input-group-btn">\n                    <button class="btn btn-default btn-big-secondary clear-datetime" type="button" data-rel="#field-orderform-fields-expiry"><span class="fa far fa-trash-alt"></span></button>\n                </span>\n            </div>\n        </div>\n    </div>\n</div>';
      return __p
    }
  },
  function(module, exports) {
    module.exports = function(obj) {
      var __t, __p = "",
        __j = Array.prototype.join,
        print = function() {
          __p += __j.call(arguments, "")
        };
      with(obj || {}) __p += '<div id="dripfeed">\n    <div class="form-group fields hidden" id="order_check">\n        <div class="form-group__checkbox">\n            <label class="form-group__checkbox-label">\n                <input name="OrderForm[check]" value="1" type="checkbox" id="field-orderform-fields-check" ', data.check && (__p += " checked "), __p += ' />\n                <span class="checkmark"></span>\n            </label>\n            <label for="field-orderform-fields-check" class="form-group__label-title">\n                ' + (null == (__t = label.dripfeed) ? "" : __t) + '\n            </label>\n        </div>\n        <div class="hidden depend-fields" id="dripfeed-options" data-depend="field-orderform-fields-check">\n            <div class="form-group">\n                <label class="control-label" for="field-orderform-fields-runs">' + (null == (__t = label["dripfeed.runs"]) ? "" : __t) + '</label>\n                <input class="form-control" name="OrderForm[runs]" value="' + (null == (__t = data.runs) ? "" : __t) + '" type="text" id="field-orderform-fields-runs" />\n            </div>\n\n            <div class="form-group">\n                <label class="control-label" for="field-orderform-fields-interval">' + (null == (__t = label["dripfeed.interval"]) ? "" : __t) + '</label>\n                <input class="form-control" name="OrderForm[interval]" value="' + (null == (__t = data.interval) ? "" : __t) + '" type="text" id="field-orderform-fields-interval" />\n            </div>\n\n            <div class="form-group">\n                <label class="control-label" for="field-orderform-fields-total-quantity">' + (null == (__t = label["dripfeed.total.quantity"]) ? "" : __t) + '</label>\n                <input class="form-control" name="OrderForm[total_quantity]" value="' + (null == (__t = data.total_quantity) ? "" : __t) + '" type="text" id="field-orderform-fields-total-quantity" readonly=""/>\n            </div>\n        </div>\n    </div>\n</div>';
      return __p
    }
  },
  function(module, exports) {
    module.exports = function(obj) {
      var __t, __p = "",
        __j = Array.prototype.join,
        print = function() {
          __p += __j.call(arguments, "")
        };
      with(obj || {}) __p += '<div class="form-group hidden fields" id="order_email">\n    <label class="control-label" for="field-orderform-fields-email">' + (null == (__t = label.email) ? "" : __t) + '</label>\n    <input class="form-control" name="OrderForm[email]" value="' + (null == (__t = data.email) ? "" : __t) + '" type="text" id="field-orderform-fields-email"/>\n</div>';
      return __p
    }
  },
  function(module, exports) {
    module.exports = function(obj) {
      var __t, __p = "",
        __j = Array.prototype.join,
        print = function() {
          __p += __j.call(arguments, "")
        };
      with(obj || {}) __p += '<div class="form-group hidden fields" id="order_groups">\n    <label class="control-label" for="field-orderform-fields-groups">' + (null == (__t = label.groups) ? "" : __t) + '</label>\n    <textarea class="form-control" name="OrderForm[groups]" id="field-orderform-fields-groups" cols="30" rows="10">' + (null == (__t = data.groups) ? "" : __t) + "</textarea>\n</div>";
      return __p
    }
  },
  function(module, exports) {
    module.exports = function(obj) {
      var __t, __p = "",
        __j = Array.prototype.join,
        print = function() {
          __p += __j.call(arguments, "")
        };
      with(obj || {}) __p += '<div class="form-group hidden fields" id="order_hashtag">\n    <label class="control-label" for="field-orderform-fields-hashtag">' + (null == (__t = label.hashtag) ? "" : __t) + '</label>\n    <input class="form-control" name="OrderForm[hashtag]" value="' + (null == (__t = data.hashtag) ? "" : __t) + '" type="text" id="field-orderform-fields-hashtag"/>\n</div>';
      return __p
    }
  },
  function(module, exports) {
    module.exports = function(obj) {
      var __t, __p = "",
        __j = Array.prototype.join,
        print = function() {
          __p += __j.call(arguments, "")
        };
      with(obj || {}) __p += '<div class="form-group hidden fields" id="order_hashtags">\n    <label class="control-label" for="field-orderform-fields-hashtags">' + (null == (__t = label.hashtags) ? "" : __t) + '</label>\n    <textarea class="form-control" name="OrderForm[hashtags]" id="field-orderform-fields-hashtags" cols="30" rows="10">' + (null == (__t = data.hashtags) ? "" : __t) + "</textarea>\n</div>";
      return __p
    }
  },
  function(module, exports) {
    module.exports = function(obj) {
      var __t, __p = "",
        __j = Array.prototype.join,
        print = function() {
          __p += __j.call(arguments, "")
        };
      with(obj || {}) __p += '<div class="form-group hidden fields" id="order_keywords">\n    <label class="control-label" for="field-orderform-fields-keywords">' + (null == (__t = label.keywords) ? "" : __t) + '</label>\n    <textarea class="form-control" name="OrderForm[keywords]" id="field-orderform-fields-keywords" cols="30" rows="10">' + (null == (__t = data.keywords) ? "" : __t) + "</textarea>\n</div>";
      return __p
    }
  },
  function(module, exports) {
    module.exports = function(obj) {
      var __t, __p = "",
        __j = Array.prototype.join,
        print = function() {
          __p += __j.call(arguments, "")
        };
      with(obj || {}) __p += '<div class="form-group hidden fields" id="order_link">\n    <label class="control-label" for="field-orderform-fields-link">' + (null == (__t = label.link) ? "" : __t) + '</label>\n    <input class="form-control" name="OrderForm[link]" value="' + (null == (__t = data.link) ? "" : __t) + '" type="text" id="field-orderform-fields-link"/>\n</div>';
      return __p
    }
  },
  function(module, exports) {
    module.exports = function(obj) {
      var __t, __p = "",
        __j = Array.prototype.join,
        print = function() {
          __p += __j.call(arguments, "")
        };
      with(obj || {}) __p += '<div class="form-group hidden fields" id="order_mediaUrl">\n    <label class="control-label" for="field-orderform-fields-mediaUrl">' + (null == (__t = label.mediaurl) ? "" : __t) + '</label>\n    <input class="form-control" name="OrderForm[mediaUrl]" value="' + (null == (__t = data.mediaUrl) ? "" : __t) + '" type="text" id="field-orderform-fields-mediaUrl"/>\n</div>';
      return __p
    }
  },
  function(module, exports) {
    module.exports = function(obj) {
      var __t, __p = "",
        __j = Array.prototype.join,
        print = function() {
          __p += __j.call(arguments, "")
        };
      with(obj || {}) __p += '<div class="form-group hidden fields" id="order_mentionUsernames">\n    <label class="control-label" for="field-orderform-fields-mentionUsernames">' + (null == (__t = label.usernames) ? "" : __t) + '</label>\n    <textarea class="form-control" name="OrderForm[mentionUsernames]" id="field-orderform-fields-mentionUsernames" cols="30" rows="10">' + (null == (__t = data.mentionUsernames) ? "" : __t) + "</textarea>\n</div>";
      return __p
    }
  },
  function(module, exports) {
    module.exports = function(obj) {
      var __t, __p = "",
        __j = Array.prototype.join,
        print = function() {
          __p += __j.call(arguments, "")
        };
      with(obj || {}) __p += '<div class="form-group hidden fields" id="order_min">\n    <label class="control-label" for="order_count">' + (null == (__t = label.quantity) ? "" : __t) + '</label>\n    <div class="row">\n        <div class="col-md-6">\n            <input type="text" class="form-control" id="order_count" name="OrderForm[min]" value="' + (null == (__t = data.min) ? "" : __t) + '" placeholder="' + (null == (__t = label.min) ? "" : __t) + '" />\n        </div>\n\n        <div class="col-md-6">\n            <input type="text" class="form-control" id="order_count" name="OrderForm[max]" value="' + (null == (__t = data.max) ? "" : __t) + '" placeholder="' + (null == (__t = label.max) ? "" : __t) + '" />\n        </div>\n    </div>\n</div>';
      return __p
    }
  },
  function(module, exports) {
    module.exports = function(obj) {
      var __t, __p = "",
        __j = Array.prototype.join,
        print = function() {
          __p += __j.call(arguments, "")
        };
      with(obj || {}) __p += '<div class="form-group hidden fields" id="order_old_posts">\n    <label class="control-label" for="field-orderform-fields-old_posts">' + (null == (__t = label.old_posts) ? "" : __t) + '</label>\n    <input class="form-control" name="OrderForm[old_posts]" value="' + (null == (__t = data.old_posts) ? "" : __t) + '" type="text" id="field-orderform-fields-old_posts"/>\n</div>';
      return __p
    }
  },
  function(module, exports) {
    module.exports = function(obj) {
      var __t, __p = "",
        __j = Array.prototype.join,
        print = function() {
          __p += __j.call(arguments, "")
        };
      with(obj || {}) __p += '<div class="form-group hidden fields" id="order_posts">\n    <label class="control-label" for="field-orderform-fields-posts">' + (null == (__t = label.new_posts) ? "" : __t) + '</label>\n    <input class="form-control" name="OrderForm[posts]" value="' + (null == (__t = data.posts) ? "" : __t) + '" type="text" id="field-orderform-fields-posts"/>\n</div>';
      return __p
    }
  },
  function(module, exports) {
    module.exports = function(obj) {
      var __t, __p = "",
        __j = Array.prototype.join,
        print = function() {
          __p += __j.call(arguments, "")
        };
      with(obj || {}) __p += '<div class="form-group hidden fields" id="order_quantity">\n    <label class="control-label" for="field-orderform-fields-quantity">' + (null == (__t = label.quantity) ? "" : __t) + '</label>\n    <input class="form-control" name="OrderForm[quantity]" value="' + (null == (__t = data.quantity) ? "" : __t) + '" type="text" id="field-orderform-fields-quantity"/>\n</div>';
      return __p
    }
  },
  function(module, exports) {
    module.exports = function(obj) {
      var __t, __p = "",
        __j = Array.prototype.join,
        print = function() {
          __p += __j.call(arguments, "")
        };
      with(obj || {}) __p += '<div class="form-group hidden fields" id="order_user_name">\n    <label class="control-label" for="field-orderform-fields-user_name">' + (null == (__t = label.username) ? "" : __t) + '</label>\n    <input class="form-control w-full" name="OrderForm[user_name]" value="' + (null == (__t = data.user_name) ? "" : __t) + '" type="text" id="field-orderform-fields-user_name"/>\n</div>';
      return __p
    }
  },
  function(module, exports) {
    module.exports = function(obj) {
      var __t, __p = "",
        __j = Array.prototype.join,
        print = function() {
          __p += __j.call(arguments, "")
        };
      with(obj || {}) __p += '<div class="form-group hidden fields" id="order_username">\n    <label class="control-label" for="field-orderform-fields-username">' + (null == (__t = label.username) ? "" : __t) + '</label>\n    <input class="form-control" name="OrderForm[username]" value="' + (null == (__t = data.username) ? "" : __t) + '" type="text" id="field-orderform-fields-username"/>\n</div>';
      return __p
    }
  },
  function(module, exports) {
    module.exports = function(obj) {
      var __t, __p = "",
        __j = Array.prototype.join,
        print = function() {
          __p += __j.call(arguments, "")
        };
      with(obj || {}) __p += '<div class="form-group hidden fields" id="order_usernames">\n    <label class="control-label" for="field-orderform-fields-usernames">' + (null == (__t = label.usernames) ? "" : __t) + '</label>\n    <textarea class="form-control w-full" name="OrderForm[usernames]" id="field-orderform-fields-usernames" cols="30" rows="10">' + (null == (__t = data.usernames) ? "" : __t) + "</textarea>\n</div>";
      return __p
    }
  },
  function(module, exports) {
    module.exports = function(obj) {
      var __t, __p = "",
        __j = Array.prototype.join,
        print = function() {
          __p += __j.call(arguments, "")
        };
      with(obj || {}) __p += '<div class="form-group hidden fields" id="order_usernames_custom">\n    <label class="control-label" for="field-orderform-fields-usernames_custom">' + (null == (__t = label.usernames) ? "" : __t) + '</label>\n    <textarea class="form-control" name="OrderForm[usernames_custom]" id="field-orderform-fields-usernames_custom" cols="30" rows="10">' + (null == (__t = data.usernames_custom) ? "" : __t) + "</textarea>\n</div>";
      return __p
    }
  },
  function(t, e) {
    customModule.siteOrdersList = {
      run: function run() {
        $("a[href^='/orders/'][href$='/refill']").on("click", (function(t) {
          t.preventDefault();
          var e = $(this).parents("td");
          $(this).attr("disabled", !0);
          var n = $(this).attr("href");
          $.ajax({
            url: n,
            type: "GET",
            success: function success(t) {
              "success" === t.status ? (e.empty(), e.text(t && t.btn_text || "")) : $(this).attr("disabled", !1)
            },
            error: function error() {
              $(this).attr("disabled", !1)
            }
          })
        })), $("a[href^='/orders/'][href$='/cancel']").on("click", (function(t) {
          t.preventDefault();
          var e = $(this).parents("td");
          $(this).attr("disabled", !0);
          var n = $(this).attr("href");
          $.ajax({
            url: n,
            type: "GET",
            success: function success(t) {
              "success" === t.status ? (e.empty(), e.text(t && t.btn_text || "")) : $(this).attr("disabled", !1)
            },
            error: function error() {
              $(this).attr("disabled", !1)
            }
          })
        }))
      }
    }
  },
  function(t, e) {
    customModule.siteSettings = {
      run: function run(t) {
        $("#api_key").tooltip({
          title: t.title
        })
      }
    }
  },
  function(t, e) {
    customModule.siteTickets = {
      run: function run(t) {
        $("#ticketsend").submit((function(e) {
          e.preventDefault();
          var n = $("#send"),
            r = $(this);
          return n.hasClass("active") || (n.addClass("active"), $.post(t.createTicketUrl, r.serialize(), (function(t) {
            n.removeClass("active"), "success" == t.status && ($(".ticket-danger").hide(), window.location.reload(!0)), "error" == t.status && ($(".ticket-danger div").html(t.error), $(".ticket-danger").show())
          }))), !1
        }))
      }
    }
  },
  function(t, e) {
    customModule.select = {
      templateResult: function templateResult(t, e, n) {
        var r = $(t.element),
          o = "result" === n ? $('<a href="#" onclick="event.preventDefault();">' + t.text + "</a>") : $("<span>" + t.text + "</span>");
        try {
          if (r.data("content")) {
            var i = r.data("content");
            return o.html(i)
          }
          if (r.data("template")) {
            var a = r.data("template"),
              s = a.match(/[^{\}]+(?=})/g);
            if (s) {
              for (var l = 0; l < s.length; l++) switch (s[l]) {
                case "service_id":
                  var c = r.data("id");
                  a = a.replace("{{service_id}}", '<span class="select2-selection__id select2-selection__id-' + String(c).length + ' badge badge-secondary badge-pill rounded-pill">' + c + "</span>");
                  break;
                case "service_name":
                  var u = r.data("name");
                  a = a.replace("{{service_name}}", '<span class="select2-selection__text">' + u + "</span>");
                  break;
                default:
                  var d = r.data(s[l]),
                    p = d || "",
                    f = "{{" + s[l] + "}}";
                  a = a.replace(f, p)
              }
              $(o).html(a)
            }
          }
          if (r.data("icon")) {
            var h = $(o).html().trimStart(),
              m = r.data("icon");
            $(o).html('<span class="btn-group-vertical align-middle select2-selection__icon">' + m + '</span><span class="select2-selection__text">' + h + "</span>")
          }
          return o
        } catch (t) {
          return o
        }
      },
      searchFunction: function searchFunction(t, e) {
        var n = t.term = t.term || "";
        if (n) {
          var r = n.toLowerCase(),
            o = $(e.element),
            i = e.text.toLowerCase();
          if (o.data("content")) return -1 !== $(o.data("content")).text().indexOf(r) ? e : null;
          if (-1 !== i.indexOf(r)) return e;
          if (o.data("id"))
            if (-1 !== (o.data("id") + "").indexOf(r)) return e;
          return null
        }
        return e
      },
      run: function run() {
        var t = this;
        $(document).ready((function() {
          var e = $("select[data-select='true']"),
            n = Boolean(e.data("select")),
            r = (Boolean(e.data("select-search")), e.data("select-search-no-results")),
            o = String(e.data("select-dir")),
            i = e.data("select-container");
          if (n) {
            var a = {
              templateResult: function templateResult(e, n) {
                return t.templateResult(e, n, "result")
              },
              templateSelection: function templateSelection(e, n) {
                return t.templateResult(e, n, "selection")
              },
              matcher: function matcher(e, n) {
                return t.searchFunction(e, n)
              },
              language: {},
              dir: o || "ltr",
              width: "100%"
            };
            r && (a.language.noResults = function() {
              return r
            }), i && $(i).length && (a.dropdownParent = $(i)), a.minimumResultsForSearch = 1 / 0, e.selectPanel(a)
          }
        }))
      }
    }
  },
  function(t, e, n) {
    customModule.userInfoModal = {
      run: function run(t) {
        this.init(t), $(document).on("click", "#userInfoSubmit", (function(t) {
          t.preventDefault();
          var e = $(this),
            n = $("#userInfoForm"),
            r = $("#userInfoError", n);
          return r.addClass("hidden"), custom.sendFrom(e, n, {
            data: n.serialize(),
            callback: function callback(t) {
              "success" == t.status && window.location.reload(), "error" == t.status && (r.removeClass("hidden"), r.html(t.error))
            }
          }), !1
        }))
      },
      init: function init(t) {
        var e = n(373);
        $("body").append(e(t)), $("#userInfoModal").modal("show")
      }
    }
  },
  function(module, exports) {
    module.exports = function(obj) {
      var __t, __p = "",
        __j = Array.prototype.join,
        print = function() {
          __p += __j.call(arguments, "")
        };
      with(obj || {}) __p += '\x3c!-- Modal --\x3e\n<div class="modal fade" id="userInfoModal" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false">\n    <div class="modal-dialog" role="document">\n        <form action="' + (null == (__t = action) ? "" : __t) + '" id="userInfoForm" method="POST" class="modal-content">\n            <div class="modal-body">\n                <div id="userInfoError" class="error-summary alert alert-danger hidden"></div>\n                <div class="form-group">\n                    <label for="first_name">' + (null == (__t = labels.first_name) ? "" : __t) + '</label>\n                    <input type="text" class="form-control" id="first_name" name="UpdateUserInfoFrom[first_name]" value="' + (null == (__t = values.first_name) ? "" : __t) + '">\n                </div>\n                <div class="form-group">\n                    <label for="last_name">' + (null == (__t = labels.last_name) ? "" : __t) + '</label>\n                    <input type="text" class="form-control" id="last_name" name="UpdateUserInfoFrom[last_name]" value="' + (null == (__t = values.last_name) ? "" : __t) + '">\n                </div>\n\n                <input type="hidden" name="_csrf" value="' + (null == (__t = csrftoken) ? "" : __t) + '">\n\n                <button type="submit" class="btn btn-primary btn-big-primary" id="userInfoSubmit">' + (null == (__t = labels.submit_btn) ? "" : __t) + "</button>\n            </div>\n        </form>\n    </div>\n</div>";
      return __p
    }
  }]);
</script>