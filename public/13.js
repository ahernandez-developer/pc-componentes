(window.webpackJsonp=window.webpackJsonp||[]).push([[13],{17:function(s,t,e){"use strict";var a={name:"AppBar",data:function(){return{drawer:!1,group:null}}},r=e(9),i=e(13),l=e.n(i),n=e(425),o=e(413),u=e(75),d=e(76),c=e(55),j=e(77),p=e(49),m=e(32),v=e(414),h=e(40),f=Object(r.a)(a,(function(){var s=this,t=s.$createElement,e=s._self._c||t;return e("div",[e("v-app-bar",{attrs:{flat:"",color:"dark",dark:"",fixed:""}},[e("v-app-bar-nav-icon",{on:{click:function(t){s.drawer=!0}}}),s._v(" "),e("v-toolbar-title",[s._v("PC Componentes")])],1),s._v(" "),e("v-navigation-drawer",{attrs:{absolute:"",temporary:""},model:{value:s.drawer,callback:function(t){s.drawer=t},expression:"drawer"}},[e("v-list",{attrs:{nav:"",dense:""}},[e("v-list-item-group",{attrs:{"active-class":"deep-purple--text text--accent-4"},model:{value:s.group,callback:function(t){s.group=t},expression:"group"}},[e("v-list-item",[e("v-list-item-icon",[e("v-icon",[s._v("mdi-home")])],1),s._v(" "),e("v-list-item-title",[s._v("Home")])],1)],1)],1)],1)],1)}),[],!1,null,null,null);t.a=f.exports;l()(f,{VAppBar:n.a,VAppBarNavIcon:o.a,VIcon:u.a,VList:d.a,VListItem:c.a,VListItemGroup:j.a,VListItemIcon:p.a,VListItemTitle:m.b,VNavigationDrawer:v.a,VToolbarTitle:h.a})},237:function(s,t,e){"use strict";e.r(t);var a=e(17),r=e(1),i=e.n(r),l={name:"Show",components:{AppBar:a.a},created:function(){this.supplierId=this.$route.params.id,this.findSupplier(this.supplierId),i.a.locale("es")},data:function(){return{supplierId:0,status:!1,supplier:{}}},methods:{findSupplier:function(){var s=this;dispatch({controller:"suppliers",action:"find",params:this.supplierId},(function(t){s.supplier=t,s.status=s.supplier.is_active?"Activo":"Deshabilitado"}))}},filters:{moment:function(s){return i()(s).format("MMMM Do YYYY, h:mm:ss a")}}},n=e(9),o=e(13),u=e.n(o),d=e(54),c=e(70),j=e(415),p=e(402),m=e(75),v=e(416),h=e(24),f=Object(n.a)(l,(function(){var s=this,t=s.$createElement,e=s._self._c||t;return e("v-form",{ref:"form",attrs:{"lazy-validation":""}},[e("div",{staticClass:"px-10 py-4"},[e("v-row",{attrs:{justify:"space-between"}},[e("h1",{staticClass:"ma-3"},[s._v("Detalles de proveedor")]),s._v(" "),e("v-btn",{staticClass:"ma-3 primary--text text-capitalize",attrs:{color:"accent",depressed:"",to:"/catalogs/suppliers",disabled:!s.status}},[s._v("\n        Volver\n        "),e("v-icon",{attrs:{dark:"",right:""}},[s._v(" mdi-undo-variant ")])],1)],1),s._v(" "),e("v-row",[e("v-col",[e("v-card",{staticClass:"pa-5",attrs:{light:""}},[e("v-row",{staticClass:"my-5"},[e("v-col",{attrs:{cols:"12",md:"6"}},[e("v-text-field",{attrs:{outlined:"",label:"Nombre",readonly:""},model:{value:s.supplier.name,callback:function(t){s.$set(s.supplier,"name",t)},expression:"supplier.name"}})],1),s._v(" "),e("v-col",{attrs:{cols:"12",md:"6"}},[e("v-text-field",{attrs:{outlined:"",label:"Dirección",readonly:""},model:{value:s.supplier.address,callback:function(t){s.$set(s.supplier,"address",t)},expression:"supplier.address"}})],1)],1),s._v(" "),e("v-row",{staticClass:"my-5"},[e("v-col",{attrs:{cols:"12",md:"6"}},[e("v-text-field",{attrs:{outlined:"",label:"Responsable",readonly:""},model:{value:s.supplier.responsable,callback:function(t){s.$set(s.supplier,"responsable",t)},expression:"supplier.responsable"}})],1),s._v(" "),e("v-col",{attrs:{cols:"12",md:"6"}},[e("v-text-field",{attrs:{outlined:"",label:"Teléfono",readonly:""},model:{value:s.supplier.phone_number,callback:function(t){s.$set(s.supplier,"phone_number",t)},expression:"supplier.phone_number"}})],1)],1),s._v(" "),e("v-row",{staticClass:"my-5"},[e("v-col",{attrs:{cols:"12",md:"6"}},[e("v-text-field",{attrs:{outlined:"","append-icon":"mdi-circle",label:"Estado",readonly:"",color:s.supplier.is_active?"green":"red"},model:{value:s.status,callback:function(t){s.status=t},expression:"status"}})],1),s._v(" "),e("v-col",{attrs:{cols:"12",md:"6"}})],1),s._v(" "),e("v-row",{staticClass:"my-5"},[e("v-col",{attrs:{cols:"12",md:"6"}},[e("v-text-field",{attrs:{outlined:"",label:"Fecha de alta",readonly:"",value:s._f("moment")(s.supplier.created_at)}})],1),s._v(" "),e("v-col",{attrs:{cols:"12",md:"6"}},[e("v-text-field",{attrs:{outlined:"",label:"Última actualización",readonly:"",value:s._f("moment")(s.supplier.updated_at)}})],1)],1)],1)],1)],1)],1)])}),[],!1,null,null,null);t.default=f.exports;u()(f,{VBtn:d.a,VCard:c.a,VCol:j.a,VForm:p.a,VIcon:m.a,VRow:v.a,VTextField:h.a})},263:function(s,t,e){var a={"./af":86,"./af.js":86,"./ar":87,"./ar-dz":88,"./ar-dz.js":88,"./ar-kw":89,"./ar-kw.js":89,"./ar-ly":90,"./ar-ly.js":90,"./ar-ma":91,"./ar-ma.js":91,"./ar-sa":92,"./ar-sa.js":92,"./ar-tn":93,"./ar-tn.js":93,"./ar.js":87,"./az":94,"./az.js":94,"./be":95,"./be.js":95,"./bg":96,"./bg.js":96,"./bm":97,"./bm.js":97,"./bn":98,"./bn-bd":99,"./bn-bd.js":99,"./bn.js":98,"./bo":100,"./bo.js":100,"./br":101,"./br.js":101,"./bs":102,"./bs.js":102,"./ca":103,"./ca.js":103,"./cs":104,"./cs.js":104,"./cv":105,"./cv.js":105,"./cy":106,"./cy.js":106,"./da":107,"./da.js":107,"./de":108,"./de-at":109,"./de-at.js":109,"./de-ch":110,"./de-ch.js":110,"./de.js":108,"./dv":111,"./dv.js":111,"./el":112,"./el.js":112,"./en-au":113,"./en-au.js":113,"./en-ca":114,"./en-ca.js":114,"./en-gb":115,"./en-gb.js":115,"./en-ie":116,"./en-ie.js":116,"./en-il":117,"./en-il.js":117,"./en-in":118,"./en-in.js":118,"./en-nz":119,"./en-nz.js":119,"./en-sg":120,"./en-sg.js":120,"./eo":121,"./eo.js":121,"./es":122,"./es-do":123,"./es-do.js":123,"./es-mx":124,"./es-mx.js":124,"./es-us":125,"./es-us.js":125,"./es.js":122,"./et":126,"./et.js":126,"./eu":127,"./eu.js":127,"./fa":128,"./fa.js":128,"./fi":129,"./fi.js":129,"./fil":130,"./fil.js":130,"./fo":131,"./fo.js":131,"./fr":132,"./fr-ca":133,"./fr-ca.js":133,"./fr-ch":134,"./fr-ch.js":134,"./fr.js":132,"./fy":135,"./fy.js":135,"./ga":136,"./ga.js":136,"./gd":137,"./gd.js":137,"./gl":138,"./gl.js":138,"./gom-deva":139,"./gom-deva.js":139,"./gom-latn":140,"./gom-latn.js":140,"./gu":141,"./gu.js":141,"./he":142,"./he.js":142,"./hi":143,"./hi.js":143,"./hr":144,"./hr.js":144,"./hu":145,"./hu.js":145,"./hy-am":146,"./hy-am.js":146,"./id":147,"./id.js":147,"./is":148,"./is.js":148,"./it":149,"./it-ch":150,"./it-ch.js":150,"./it.js":149,"./ja":151,"./ja.js":151,"./jv":152,"./jv.js":152,"./ka":153,"./ka.js":153,"./kk":154,"./kk.js":154,"./km":155,"./km.js":155,"./kn":156,"./kn.js":156,"./ko":157,"./ko.js":157,"./ku":158,"./ku.js":158,"./ky":159,"./ky.js":159,"./lb":160,"./lb.js":160,"./lo":161,"./lo.js":161,"./lt":162,"./lt.js":162,"./lv":163,"./lv.js":163,"./me":164,"./me.js":164,"./mi":165,"./mi.js":165,"./mk":166,"./mk.js":166,"./ml":167,"./ml.js":167,"./mn":168,"./mn.js":168,"./mr":169,"./mr.js":169,"./ms":170,"./ms-my":171,"./ms-my.js":171,"./ms.js":170,"./mt":172,"./mt.js":172,"./my":173,"./my.js":173,"./nb":174,"./nb.js":174,"./ne":175,"./ne.js":175,"./nl":176,"./nl-be":177,"./nl-be.js":177,"./nl.js":176,"./nn":178,"./nn.js":178,"./oc-lnc":179,"./oc-lnc.js":179,"./pa-in":180,"./pa-in.js":180,"./pl":181,"./pl.js":181,"./pt":182,"./pt-br":183,"./pt-br.js":183,"./pt.js":182,"./ro":184,"./ro.js":184,"./ru":185,"./ru.js":185,"./sd":186,"./sd.js":186,"./se":187,"./se.js":187,"./si":188,"./si.js":188,"./sk":189,"./sk.js":189,"./sl":190,"./sl.js":190,"./sq":191,"./sq.js":191,"./sr":192,"./sr-cyrl":193,"./sr-cyrl.js":193,"./sr.js":192,"./ss":194,"./ss.js":194,"./sv":195,"./sv.js":195,"./sw":196,"./sw.js":196,"./ta":197,"./ta.js":197,"./te":198,"./te.js":198,"./tet":199,"./tet.js":199,"./tg":200,"./tg.js":200,"./th":201,"./th.js":201,"./tk":202,"./tk.js":202,"./tl-ph":203,"./tl-ph.js":203,"./tlh":204,"./tlh.js":204,"./tr":205,"./tr.js":205,"./tzl":206,"./tzl.js":206,"./tzm":207,"./tzm-latn":208,"./tzm-latn.js":208,"./tzm.js":207,"./ug-cn":209,"./ug-cn.js":209,"./uk":210,"./uk.js":210,"./ur":211,"./ur.js":211,"./uz":212,"./uz-latn":213,"./uz-latn.js":213,"./uz.js":212,"./vi":214,"./vi.js":214,"./x-pseudo":215,"./x-pseudo.js":215,"./yo":216,"./yo.js":216,"./zh-cn":217,"./zh-cn.js":217,"./zh-hk":218,"./zh-hk.js":218,"./zh-mo":219,"./zh-mo.js":219,"./zh-tw":220,"./zh-tw.js":220};function r(s){var t=i(s);return e(t)}function i(s){if(!e.o(a,s)){var t=new Error("Cannot find module '"+s+"'");throw t.code="MODULE_NOT_FOUND",t}return a[s]}r.keys=function(){return Object.keys(a)},r.resolve=i,s.exports=r,r.id=263},402:function(s,t,e){"use strict";var a=e(2),r=e(28),i=e(34);t.a=Object(a.a)(r.a,Object(i.b)("form")).extend({name:"v-form",provide(){return{form:this}},inheritAttrs:!1,props:{disabled:Boolean,lazyValidation:Boolean,readonly:Boolean,value:Boolean},data:()=>({inputs:[],watchers:[],errorBag:{}}),watch:{errorBag:{handler(s){const t=Object.values(s).includes(!0);this.$emit("input",!t)},deep:!0,immediate:!0}},methods:{watchInput(s){const t=s=>s.$watch("hasError",t=>{this.$set(this.errorBag,s._uid,t)},{immediate:!0}),e={_uid:s._uid,valid:()=>{},shouldValidate:()=>{}};return this.lazyValidation?e.shouldValidate=s.$watch("shouldValidate",a=>{a&&(this.errorBag.hasOwnProperty(s._uid)||(e.valid=t(s)))}):e.valid=t(s),e},validate(){return 0===this.inputs.filter(s=>!s.validate(!0)).length},reset(){this.inputs.forEach(s=>s.reset()),this.resetErrorBag()},resetErrorBag(){this.lazyValidation&&setTimeout(()=>{this.errorBag={}},0)},resetValidation(){this.inputs.forEach(s=>s.resetValidation()),this.resetErrorBag()},register(s){this.inputs.push(s),this.watchers.push(this.watchInput(s))},unregister(s){const t=this.inputs.find(t=>t._uid===s._uid);if(!t)return;const e=this.watchers.find(s=>s._uid===t._uid);e&&(e.valid(),e.shouldValidate()),this.watchers=this.watchers.filter(s=>s._uid!==t._uid),this.inputs=this.inputs.filter(s=>s._uid!==t._uid),this.$delete(this.errorBag,t._uid)}},render(s){return s("form",{staticClass:"v-form",attrs:{novalidate:!0,...this.attrs$},on:{submit:s=>this.$emit("submit",s)}},this.$slots.default)}})}}]);