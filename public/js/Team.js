"use strict";
(self["webpackChunk"] = self["webpackChunk"] || []).push([["Team"],{

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/app/AppTeam.vue?vue&type=script&lang=js&":
/*!******************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/app/AppTeam.vue?vue&type=script&lang=js& ***!
  \******************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var vuex__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! vuex */ "./node_modules/vuex/dist/vuex.esm.js");
function ownKeys(object, enumerableOnly) { var keys = Object.keys(object); if (Object.getOwnPropertySymbols) { var symbols = Object.getOwnPropertySymbols(object); enumerableOnly && (symbols = symbols.filter(function (sym) { return Object.getOwnPropertyDescriptor(object, sym).enumerable; })), keys.push.apply(keys, symbols); } return keys; }

function _objectSpread(target) { for (var i = 1; i < arguments.length; i++) { var source = null != arguments[i] ? arguments[i] : {}; i % 2 ? ownKeys(Object(source), !0).forEach(function (key) { _defineProperty(target, key, source[key]); }) : Object.getOwnPropertyDescriptors ? Object.defineProperties(target, Object.getOwnPropertyDescriptors(source)) : ownKeys(Object(source)).forEach(function (key) { Object.defineProperty(target, key, Object.getOwnPropertyDescriptor(source, key)); }); } return target; }

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

/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ({
  data: function data() {
    return {
      currentPage: 1
    };
  },
  methods: {
    handleCurrentChange: function handleCurrentChange() {
      this.$store.dispatch("index/getTeams", this.currentPage);
    },
    getTeams: function getTeams() {
      this.$store.dispatch("index/getTeams", this.currentPage);
    }
  },
  computed: _objectSpread({}, (0,vuex__WEBPACK_IMPORTED_MODULE_0__.mapGetters)({
    teams: "index/getTeams"
  })),
  created: function created() {
    this.getTeams();
  }
});

/***/ }),

/***/ "./resources/js/components/app/AppTeam.vue":
/*!*************************************************!*\
  !*** ./resources/js/components/app/AppTeam.vue ***!
  \*************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _AppTeam_vue_vue_type_template_id_1aa4ddd6___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./AppTeam.vue?vue&type=template&id=1aa4ddd6& */ "./resources/js/components/app/AppTeam.vue?vue&type=template&id=1aa4ddd6&");
/* harmony import */ var _AppTeam_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./AppTeam.vue?vue&type=script&lang=js& */ "./resources/js/components/app/AppTeam.vue?vue&type=script&lang=js&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! !../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */
;
var component = (0,_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _AppTeam_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _AppTeam_vue_vue_type_template_id_1aa4ddd6___WEBPACK_IMPORTED_MODULE_0__.render,
  _AppTeam_vue_vue_type_template_id_1aa4ddd6___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns,
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/app/AppTeam.vue"
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (component.exports);

/***/ }),

/***/ "./resources/js/components/app/AppTeam.vue?vue&type=script&lang=js&":
/*!**************************************************************************!*\
  !*** ./resources/js/components/app/AppTeam.vue?vue&type=script&lang=js& ***!
  \**************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_AppTeam_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./AppTeam.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/app/AppTeam.vue?vue&type=script&lang=js&");
 /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (_node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_AppTeam_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/app/AppTeam.vue?vue&type=template&id=1aa4ddd6&":
/*!********************************************************************************!*\
  !*** ./resources/js/components/app/AppTeam.vue?vue&type=template&id=1aa4ddd6& ***!
  \********************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_AppTeam_vue_vue_type_template_id_1aa4ddd6___WEBPACK_IMPORTED_MODULE_0__.render),
/* harmony export */   "staticRenderFns": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_AppTeam_vue_vue_type_template_id_1aa4ddd6___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns)
/* harmony export */ });
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_AppTeam_vue_vue_type_template_id_1aa4ddd6___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./AppTeam.vue?vue&type=template&id=1aa4ddd6& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/app/AppTeam.vue?vue&type=template&id=1aa4ddd6&");


/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/app/AppTeam.vue?vue&type=template&id=1aa4ddd6&":
/*!***********************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/app/AppTeam.vue?vue&type=template&id=1aa4ddd6& ***!
  \***********************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* binding */ render),
/* harmony export */   "staticRenderFns": () => (/* binding */ staticRenderFns)
/* harmony export */ });
var render = function () {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("div", { staticClass: "leadership-area section-gap" }, [
    _c("div", { staticClass: "container" }, [
      _c(
        "div",
        { staticClass: "row" },
        _vm._l(_vm.teams.data, function (team, i) {
          return _c(
            "div",
            { key: i, staticClass: "col-lg-4 col-md-6 col-sm-6" },
            [
              _c("div", { staticClass: "team-member mb-30" }, [
                _c("div", { staticClass: "member-photo" }, [
                  _c("img", {
                    directives: [
                      {
                        name: "lazy",
                        rawName: "v-lazy",
                        value: "/uploads/" + team.image,
                        expression: "`/uploads/${team.image}`",
                      },
                    ],
                  }),
                  _vm._v(" "),
                  _c("div", { staticClass: "social-icon" }, [
                    team.url1 && team.icon1
                      ? _c("a", { attrs: { href: team.url1 } }, [
                          _c("i", { class: team.icon1 }),
                        ])
                      : _vm._e(),
                    _vm._v(" "),
                    team.url2 && team.icon2
                      ? _c("a", { attrs: { href: team.url2 } }, [
                          _c("i", { class: team.icon2 }),
                        ])
                      : _vm._e(),
                    _vm._v(" "),
                    team.url3 && team.icon3
                      ? _c("a", { attrs: { href: team.url3 } }, [
                          _c("i", { class: team.icon3 }),
                        ])
                      : _vm._e(),
                    _vm._v(" "),
                    team.url4 && team.icon4
                      ? _c("a", { attrs: { href: team.url4 } }, [
                          _c("i", { class: team.icon4 }),
                        ])
                      : _vm._e(),
                    _vm._v(" "),
                    team.url5 && team.icon5
                      ? _c("a", { attrs: { href: team.url5 } }, [
                          _c("i", { class: team.icon5 }),
                        ])
                      : _vm._e(),
                  ]),
                ]),
                _vm._v(" "),
                _c("div", { staticClass: "team-content" }, [
                  _c(
                    "h5",
                    { staticClass: "name" },
                    [
                      _c(
                        "router-link",
                        {
                          attrs: {
                            to: {
                              name: "TeamDetails",
                              params: { id: team.id },
                            },
                          },
                        },
                        [_vm._v(_vm._s(team.name))]
                      ),
                    ],
                    1
                  ),
                  _vm._v(" "),
                  _c("span", { staticClass: "position" }, [
                    _vm._v(_vm._s(team.dagenation)),
                  ]),
                ]),
              ]),
            ]
          )
        }),
        0
      ),
      _vm._v(" "),
      _vm.teams.meta
        ? _c("div", { staticClass: "row mt-30" }, [
            _c("div", { staticClass: "col-lg-12 text-center" }, [
              _c(
                "div",
                { staticClass: "d-inline-block" },
                [
                  _c("el-pagination", {
                    staticClass: "text-center mt-4",
                    attrs: {
                      background: "",
                      "current-page": _vm.currentPage,
                      "page-size": _vm.teams.meta.per_page,
                      layout: "prev, pager, next",
                      total: _vm.teams.meta.total,
                    },
                    on: {
                      "current-change": _vm.handleCurrentChange,
                      "update:currentPage": function ($event) {
                        _vm.currentPage = $event
                      },
                      "update:current-page": function ($event) {
                        _vm.currentPage = $event
                      },
                    },
                  }),
                ],
                1
              ),
            ]),
          ])
        : _vm._e(),
    ]),
  ])
}
var staticRenderFns = []
render._withStripped = true



/***/ })

}]);