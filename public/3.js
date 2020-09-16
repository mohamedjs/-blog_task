(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[3],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/Article.vue?vue&type=script&lang=js&":
/*!*************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/views/Article.vue?vue&type=script&lang=js& ***!
  \*************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var vuex__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! vuex */ "./node_modules/vuex/dist/vuex.esm.js");
function ownKeys(object, enumerableOnly) { var keys = Object.keys(object); if (Object.getOwnPropertySymbols) { var symbols = Object.getOwnPropertySymbols(object); if (enumerableOnly) symbols = symbols.filter(function (sym) { return Object.getOwnPropertyDescriptor(object, sym).enumerable; }); keys.push.apply(keys, symbols); } return keys; }

function _objectSpread(target) { for (var i = 1; i < arguments.length; i++) { var source = arguments[i] != null ? arguments[i] : {}; if (i % 2) { ownKeys(Object(source), true).forEach(function (key) { _defineProperty(target, key, source[key]); }); } else if (Object.getOwnPropertyDescriptors) { Object.defineProperties(target, Object.getOwnPropertyDescriptors(source)); } else { ownKeys(Object(source)).forEach(function (key) { Object.defineProperty(target, key, Object.getOwnPropertyDescriptor(source, key)); }); } } return target; }

function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }

//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//

/* harmony default export */ __webpack_exports__["default"] = ({
  data: function data() {
    return {};
  },
  computed: _objectSpread({
    validateForm: function validateForm() {
      return !this.errors.any();
    }
  }, Object(vuex__WEBPACK_IMPORTED_MODULE_0__["mapState"])('article', ['article', 'comment'])),
  watch: {},
  methods: {
    fetchArticle: function fetchArticle() {
      this.$store.dispatch('article/fetchArticle', this.$route.params.articleId);
    },
    updateValue: function updateValue(key, $event) {
      var payload = {
        key: key,
        value: $event.target.value
      };
      this.$store.dispatch('article/setCommentKey', payload);
    },
    save: function save() {
      var _this2 = this;

      if (!this.validateForm) return;

      var _this = this;

      this.$store.dispatch('article/createComment', this.$route.params.articleId).then(function (response) {
        _this2.$store.dispatch('article/fetchArticle', _this2.$route.params.articleId);
      })["catch"](function (error) {
        if (error.response.status == 422) //validation error
          {
            // Add errors to VeeValidate Error Bag
            var entries = Object.entries(error.response.data.data);
            entries.forEach(function (item, index) {
              _this.errors.add({
                field: item[0],
                msg: item[1][0]
              });
            });
          }
      });
    }
  },
  mounted: function mounted() {
    this.fetchArticle();
  }
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/Article.vue?vue&type=template&id=4be6f627&":
/*!*****************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/views/Article.vue?vue&type=template&id=4be6f627& ***!
  \*****************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("div", { staticClass: "grid-article" }, [
    _c("div", { staticClass: "container" }, [
      _c(
        "div",
        {
          staticClass: "mx-auto text-secondary",
          staticStyle: { "max-width": "700px", top: "-80px" }
        },
        [
          _c("h1", { staticClass: "font-weight-bold text-dark" }, [
            _vm._v(_vm._s(_vm.article.name))
          ]),
          _vm._v(" "),
          _c("img", {
            staticClass: "w-100 height-70",
            attrs: { src: _vm.article.image }
          })
        ]
      ),
      _vm._v(" "),
      _c("br"),
      _vm._v(" "),
      _c("br"),
      _vm._v(" "),
      _c(
        "div",
        {
          staticClass: "mx-auto text-secondary",
          staticStyle: { "max-width": "700px", top: "-80px" }
        },
        [
          _c(
            "blockquote",
            {
              staticClass: "text-primary p-3 font-italic",
              staticStyle: {
                "border-left": "8px solid #2e2e2e",
                "line-height": "2"
              }
            },
            [_vm._v(_vm._s(_vm.article.description))]
          ),
          _vm._v(" "),
          _c("br"),
          _vm._v(" "),
          _c("section", { staticClass: "mb-4" }, [
            _c("h2", { staticClass: "h1-responsive font-weight-bold" }, [
              _vm._v("Comment")
            ]),
            _vm._v(" "),
            _c("div", { staticClass: "row" }, [
              _c("div", { staticClass: "col-md-9 mb-md-0 mb-5" }, [
                _c(
                  "form",
                  {
                    attrs: {
                      id: "contact-form",
                      name: "contact-form",
                      action: "mail.php",
                      method: "POST"
                    }
                  },
                  [
                    _c("div", { staticClass: "row" }, [
                      _c("div", { staticClass: "col-md-6" }, [
                        _c("div", { staticClass: "md-form mb-0" }, [
                          _c("input", {
                            directives: [
                              {
                                name: "validate",
                                rawName: "v-validate",
                                value: "required|min:3",
                                expression: "'required|min:3'"
                              },
                              {
                                name: "model",
                                rawName: "v-model",
                                value: _vm.comment.name,
                                expression: "comment.name"
                              }
                            ],
                            staticClass: "form-control",
                            attrs: {
                              "data-vv-validate-on": "blur",
                              type: "text",
                              id: "name",
                              name: "name"
                            },
                            domProps: { value: _vm.comment.name },
                            on: {
                              keyup: function($event) {
                                return _vm.updateValue("name", $event)
                              },
                              input: function($event) {
                                if ($event.target.composing) {
                                  return
                                }
                                _vm.$set(
                                  _vm.comment,
                                  "name",
                                  $event.target.value
                                )
                              }
                            }
                          }),
                          _vm._v(" "),
                          _c("label", { attrs: { for: "name" } }, [
                            _vm._v("Your name")
                          ]),
                          _vm._v(" "),
                          _c("span", { staticClass: "text-danger text-sm" }, [
                            _vm._v(_vm._s(_vm.errors.first("name")))
                          ])
                        ])
                      ]),
                      _vm._v(" "),
                      _c("div", { staticClass: "col-md-6" }, [
                        _c("div", { staticClass: "md-form mb-0" }, [
                          _c("input", {
                            directives: [
                              {
                                name: "validate",
                                rawName: "v-validate",
                                value: "required|email|min:3",
                                expression: "'required|email|min:3'"
                              },
                              {
                                name: "model",
                                rawName: "v-model",
                                value: _vm.comment.email,
                                expression: "comment.email"
                              }
                            ],
                            staticClass: "form-control",
                            attrs: {
                              "data-vv-validate-on": "blur",
                              type: "text",
                              id: "email",
                              name: "email"
                            },
                            domProps: { value: _vm.comment.email },
                            on: {
                              keyup: function($event) {
                                return _vm.updateValue("email", $event)
                              },
                              input: function($event) {
                                if ($event.target.composing) {
                                  return
                                }
                                _vm.$set(
                                  _vm.comment,
                                  "email",
                                  $event.target.value
                                )
                              }
                            }
                          }),
                          _vm._v(" "),
                          _c("label", { attrs: { for: "email" } }, [
                            _vm._v("Your email")
                          ]),
                          _vm._v(" "),
                          _c("span", { staticClass: "text-danger text-sm" }, [
                            _vm._v(_vm._s(_vm.errors.first("email")))
                          ])
                        ])
                      ])
                    ]),
                    _vm._v(" "),
                    _c("div", { staticClass: "row" }, [
                      _c("div", { staticClass: "col-md-12" }, [
                        _c("div", { staticClass: "md-form" }, [
                          _c("textarea", {
                            directives: [
                              {
                                name: "validate",
                                rawName: "v-validate",
                                value: "required|min:3",
                                expression: "'required|min:3'"
                              },
                              {
                                name: "model",
                                rawName: "v-model",
                                value: _vm.comment.comment,
                                expression: "comment.comment"
                              }
                            ],
                            staticClass: "form-control md-textarea",
                            attrs: {
                              "data-vv-validate-on": "blur",
                              type: "text",
                              id: "message",
                              name: "comment",
                              rows: "2"
                            },
                            domProps: { value: _vm.comment.comment },
                            on: {
                              keyup: function($event) {
                                return _vm.updateValue("comment", $event)
                              },
                              input: function($event) {
                                if ($event.target.composing) {
                                  return
                                }
                                _vm.$set(
                                  _vm.comment,
                                  "comment",
                                  $event.target.value
                                )
                              }
                            }
                          }),
                          _vm._v(" "),
                          _c("label", { attrs: { for: "message" } }, [
                            _vm._v("Your Comment")
                          ]),
                          _vm._v(" "),
                          _c("span", { staticClass: "text-danger text-sm" }, [
                            _vm._v(_vm._s(_vm.errors.first("comment")))
                          ])
                        ])
                      ])
                    ])
                  ]
                ),
                _vm._v(" "),
                _c("div", { staticClass: "text-md-right" }, [
                  _c(
                    "a",
                    {
                      staticClass: "btn btn-primary",
                      attrs: { disabled: !_vm.validateForm },
                      on: {
                        click: function($event) {
                          $event.preventDefault()
                          return _vm.save($event)
                        }
                      }
                    },
                    [_vm._v("Send")]
                  )
                ]),
                _vm._v(" "),
                _c("div", { staticClass: "status" })
              ])
            ])
          ]),
          _vm._v(" "),
          _c("br"),
          _vm._v(" "),
          _c(
            "section",
            { staticClass: "mb-4" },
            _vm._l(_vm.article.comments, function(comment, index) {
              return _c("article", { staticClass: "row" }, [
                _c("div", { staticClass: "col-md-2 col-sm-2 hidden-xs" }, [
                  _c("figure", { staticClass: "thumbnail" }, [
                    _c("img", {
                      staticClass: "img-responsive",
                      attrs: { src: "/assets/img/theme/avatar.png" }
                    }),
                    _vm._v(" "),
                    _c("figcaption", { staticClass: "text-center" }, [
                      _vm._v(_vm._s(comment.name))
                    ])
                  ])
                ]),
                _vm._v(" "),
                _c("div", { staticClass: "col-md-10 col-sm-10" }, [
                  _c("div", { staticClass: "panel panel-default arrow left" }, [
                    _c("div", { staticClass: "panel-body" }, [
                      _c("header", { staticClass: "text-left" }, [
                        _c("div", { staticClass: "comment-user" }, [
                          _c("i", { staticClass: "fa fa-user" }),
                          _vm._v(" " + _vm._s(comment.name))
                        ]),
                        _vm._v(" "),
                        _c(
                          "time",
                          {
                            staticClass: "comment-date",
                            attrs: { datetime: "16-12-2014 01:05" }
                          },
                          [
                            _c("i", { staticClass: "fa fa-clock-o" }),
                            _vm._v(" " + _vm._s(comment.created_at))
                          ]
                        )
                      ]),
                      _vm._v(" "),
                      _c("div", { staticClass: "comment-post" }, [
                        _c("p", [
                          _vm._v(
                            "\n                        " +
                              _vm._s(comment.comment) +
                              "\n                      "
                          )
                        ])
                      ])
                    ])
                  ])
                ])
              ])
            }),
            0
          )
        ]
      )
    ])
  ])
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./resources/js/views/Article.vue":
/*!****************************************!*\
  !*** ./resources/js/views/Article.vue ***!
  \****************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _Article_vue_vue_type_template_id_4be6f627___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Article.vue?vue&type=template&id=4be6f627& */ "./resources/js/views/Article.vue?vue&type=template&id=4be6f627&");
/* harmony import */ var _Article_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Article.vue?vue&type=script&lang=js& */ "./resources/js/views/Article.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _Article_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _Article_vue_vue_type_template_id_4be6f627___WEBPACK_IMPORTED_MODULE_0__["render"],
  _Article_vue_vue_type_template_id_4be6f627___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/views/Article.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/views/Article.vue?vue&type=script&lang=js&":
/*!*****************************************************************!*\
  !*** ./resources/js/views/Article.vue?vue&type=script&lang=js& ***!
  \*****************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Article_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib??ref--4-0!../../../node_modules/vue-loader/lib??vue-loader-options!./Article.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/Article.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Article_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/views/Article.vue?vue&type=template&id=4be6f627&":
/*!***********************************************************************!*\
  !*** ./resources/js/views/Article.vue?vue&type=template&id=4be6f627& ***!
  \***********************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Article_vue_vue_type_template_id_4be6f627___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../node_modules/vue-loader/lib??vue-loader-options!./Article.vue?vue&type=template&id=4be6f627& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/Article.vue?vue&type=template&id=4be6f627&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Article_vue_vue_type_template_id_4be6f627___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Article_vue_vue_type_template_id_4be6f627___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);