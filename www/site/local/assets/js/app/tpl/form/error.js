define(["handlebars"],function(e){return e.template({compiler:[6,">= 2.0.0-beta.1"],main:function(e,a,n,l){var s,t="function",r=a.helperMissing,h=this.escapeExpression;return'<h2 class="alert">'+h((s=null!=(s=a.header||(null!=e?e.header:e))?s:r,typeof s===t?s.call(e,{name:"header",hash:{},data:l}):s))+"</h2>\n<p>"+h((s=null!=(s=a.message||(null!=e?e.message:e))?s:r,typeof s===t?s.call(e,{name:"message",hash:{},data:l}):s))+"</p>\n"},useData:!0})});