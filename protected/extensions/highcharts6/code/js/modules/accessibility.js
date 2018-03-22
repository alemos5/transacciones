/*
 Highcharts JS v6.0.1 (2017-10-05)
 Accessibility module

 (c) 2010-2017 Highsoft AS
 Author: Oystein Moseng

 License: www.highcharts.com/license
*/
(function(q){"object"===typeof module&&module.exports?module.exports=q:q(Highcharts)})(function(q){(function(e){function q(a){return a.replace(/&/g,"\x26amp;").replace(/</g,"\x26lt;").replace(/>/g,"\x26gt;").replace(/"/g,"\x26quot;").replace(/'/g,"\x26#x27;").replace(/\//g,"\x26#x2F;")}function B(a){for(var c=a.childNodes.length;c--;)a.appendChild(a.childNodes[c])}function r(a){var c;a&&a.onclick&&l.createEvent&&(c=l.createEvent("Events"),c.initEvent("click",!0,!1),a.onclick(c))}function m(a){return a.isNull&&
a.series.chart.options.accessibility.keyboardNavigation.skipNullPoints||a.series.options.skipKeyboardNavigation||!a.series.visible}var A=e.win,l=A.document,h=e.each,C=e.erase,x=e.addEvent,D=e.removeEvent,y=e.fireEvent,E=e.dateFormat,v=e.merge,z={position:"absolute",left:"-9999px",top:"auto",width:"1px",height:"1px",overflow:"hidden"},t={"default":["series","data point","data points"],line:["line","data point","data points"],spline:["line","data point","data points"],area:["line","data point","data points"],
areaspline:["line","data point","data points"],pie:["pie","slice","slices"],column:["column series","column","columns"],bar:["bar series","bar","bars"],scatter:["scatter series","data point","data points"],boxplot:["boxplot series","box","boxes"],arearange:["arearange series","data point","data points"],areasplinerange:["areasplinerange series","data point","data points"],bubble:["bubble series","bubble","bubbles"],columnrange:["columnrange series","column","columns"],errorbar:["errorbar series",
"errorbar","errorbars"],funnel:["funnel","data point","data points"],pyramid:["pyramid","data point","data points"],waterfall:["waterfall series","column","columns"],map:["map","area","areas"],mapline:["line","data point","data points"],mappoint:["point series","data point","data points"],mapbubble:["bubble series","bubble","bubbles"]},F={boxplot:" Box plot charts are typically used to display groups of statistical data. Each data point in the chart can have up to 5 values: minimum, lower quartile, median, upper quartile and maximum. ",
arearange:" Arearange charts are line charts displaying a range between a lower and higher value for each point. ",areasplinerange:" These charts are line charts displaying a range between a lower and higher value for each point. ",bubble:" Bubble charts are scatter charts where each data point also has a size value. ",columnrange:" Columnrange charts are column charts displaying a range between a lower and higher value for each point. ",errorbar:" Errorbar series are used to display the variability of the data. ",
funnel:" Funnel charts are used to display reduction of data in stages. ",pyramid:" Pyramid charts consist of a single pyramid with item heights corresponding to each point value. ",waterfall:" A waterfall chart is a column chart where each column contributes towards a total end value. "};e.Series.prototype.commonKeys="name id category x value y".split(" ");e.Series.prototype.specialKeys="z open high q3 median q1 low close".split(" ");e.seriesTypes.pie&&(e.seriesTypes.pie.prototype.specialKeys=[]);
e.Series.prototype.keyboardMoveVertical=!0;h(["column","pie"],function(a){e.seriesTypes[a]&&(e.seriesTypes[a].prototype.keyboardMoveVertical=!1)});e.setOptions({accessibility:{enabled:!0,pointDescriptionThreshold:30,keyboardNavigation:{enabled:!0}}});e.wrap(e.Series.prototype,"render",function(a){a.apply(this,Array.prototype.slice.call(arguments,1));this.chart.options.accessibility.enabled&&this.setA11yDescription()});e.Series.prototype.setA11yDescription=function(){var a=this.chart.options.accessibility,
c=this.points&&this.points.length&&this.points[0].graphic&&this.points[0].graphic.element,d=c&&c.parentNode||this.graph&&this.graph.element||this.group&&this.group.element;d&&(d.lastChild===c&&B(d),this.points&&(this.points.length<a.pointDescriptionThreshold||!1===a.pointDescriptionThreshold)&&h(this.points,function(b){b.graphic&&(b.graphic.element.setAttribute("role","img"),b.graphic.element.setAttribute("tabindex","-1"),b.graphic.element.setAttribute("aria-label",b.series.options.pointDescriptionFormatter&&
b.series.options.pointDescriptionFormatter(b)||a.pointDescriptionFormatter&&a.pointDescriptionFormatter(b)||b.buildPointInfoString()))}),1<this.chart.series.length||a.describeSingleSeries)&&(d.setAttribute("role",this.options.exposeElementToA11y?"img":"region"),d.setAttribute("tabindex","-1"),d.setAttribute("aria-label",a.seriesDescriptionFormatter&&a.seriesDescriptionFormatter(this)||this.buildSeriesInfoString()))};e.Series.prototype.buildSeriesInfoString=function(){var a=t[this.type]||t["default"],
c=this.description||this.options.description;return(this.name?this.name+", ":"")+(1===this.chart.types.length?a[0]:"series")+" "+(this.index+1)+" of "+this.chart.series.length+(1===this.chart.types.length?" with ":". "+a[0]+" with ")+(this.points.length+" "+(1===this.points.length?a[1]:a[2]))+(c?". "+c:"")+(1<this.chart.yAxis.length&&this.yAxis?". Y axis, "+this.yAxis.getDescription():"")+(1<this.chart.xAxis.length&&this.xAxis?". X axis, "+this.xAxis.getDescription():"")};e.Point.prototype.buildPointInfoString=
function(){var a=this,c=a.series,d=c.chart.options.accessibility,b="",g=c.xAxis&&c.xAxis.isDatetimeAxis,d=g&&E(d.pointDateFormatter&&d.pointDateFormatter(a)||d.pointDateFormat||e.Tooltip.prototype.getXDateFormat(a,c.chart.options.tooltip,c.xAxis),a.x);e.find(c.specialKeys,function(b){return void 0!==a[b]})?(g&&(b=d),h(c.commonKeys.concat(c.specialKeys),function(c){void 0===a[c]||g&&"x"===c||(b+=(b?". ":"")+c+", "+a[c])})):b=(this.name||d||this.category||this.id||"x, "+this.x)+", "+(void 0!==this.value?
this.value:this.y);return this.index+1+". "+b+"."+(this.description?" "+this.description:"")};e.Axis.prototype.getDescription=function(){return this.userOptions&&this.userOptions.description||this.axisTitle&&this.axisTitle.textStr||this.options.id||this.categories&&"categories"||"values"};e.Axis.prototype.panStep=function(a,c){var d=c||3;c=this.getExtremes();var b=(c.max-c.min)/d*a,d=c.max+b,b=c.min+b,g=d-b;0>a&&b<c.dataMin?(b=c.dataMin,d=b+g):0<a&&d>c.dataMax&&(d=c.dataMax,b=d-g);this.setExtremes(b,
d)};e.wrap(e.Series.prototype,"init",function(a){a.apply(this,Array.prototype.slice.call(arguments,1));var c=this.chart;c.options.accessibility.enabled&&(c.types=c.types||[],0>c.types.indexOf(this.type)&&c.types.push(this.type),x(this,"remove",function(){var a=this,b=!1;h(c.series,function(g){g!==a&&0>c.types.indexOf(a.type)&&(b=!0)});b||C(c.types,a.type)}))});e.Chart.prototype.getTypeDescription=function(){var a=this.types&&this.types[0],c=this.series[0]&&this.series[0].mapTitle;if(a){if("map"===
a)return c?"Map of "+c:"Map of unspecified region.";if(1<this.types.length)return"Combination chart.";if(-1<["spline","area","areaspline"].indexOf(a))return"Line chart."}else return"Empty chart.";return a+" chart."+(F[a]||"")};e.Chart.prototype.getAxesDescription=function(){var a=this.xAxis.length,c=this.yAxis.length,d={},b;if(a)if(d.xAxis="The chart has "+a+(1<a?" X axes":" X axis")+" displaying ",2>a)d.xAxis+=this.xAxis[0].getDescription()+".";else{for(b=0;b<a-1;++b)d.xAxis+=(b?", ":"")+this.xAxis[b].getDescription();
d.xAxis+=" and "+this.xAxis[b].getDescription()+"."}if(c)if(d.yAxis="The chart has "+c+(1<c?" Y axes":" Y axis")+" displaying ",2>c)d.yAxis+=this.yAxis[0].getDescription()+".";else{for(b=0;b<c-1;++b)d.yAxis+=(b?", ":"")+this.yAxis[b].getDescription();d.yAxis+=" and "+this.yAxis[b].getDescription()+"."}return d};e.Chart.prototype.addAccessibleContextMenuAttribs=function(){var a=this.exportDivElements;a&&(h(a,function(a){"DIV"!==a.tagName||a.children&&a.children.length||(a.setAttribute("role","menuitem"),
a.setAttribute("tabindex",-1))}),a[0].parentNode.setAttribute("role","menu"),a[0].parentNode.setAttribute("aria-label","Chart export"))};e.Point.prototype.highlight=function(){var a=this.series.chart;this.graphic&&this.graphic.element.focus&&this.graphic.element.focus();this.isNull?a.tooltip&&a.tooltip.hide(0):(this.onMouseOver(),a.tooltip&&a.tooltip.refresh(a.tooltip.shared?[this]:this));a.highlightedPoint=this;return this};e.Chart.prototype.highlightAdjacentPoint=function(a){var c=this.series,d=
this.highlightedPoint,b=d&&d.index||0,g=d&&d.series.points,f=this.series&&this.series[this.series.length-1],e=f&&f.points&&f.points[f.points.length-1],f=d&&d.series.connectEnds&&b>g.length-3?2:1;if(!c[0]||!c[0].points)return!1;if(d){if(g[b]!==d)for(e=0;e<g.length;++e)if(g[e]===d){b=e;break}c=c[d.series.index+(a?1:-1)];b=g[b+(a?f:-1)]||c&&c.points[a?0:c.points.length-(c.connectEnds?2:1)];if(void 0===b)return!1}else b=a?c[0].points[0]:e;return m(b)?(this.highlightedPoint=b,this.highlightAdjacentPoint(a)):
b.highlight()};e.Series.prototype.highlightFirstValidPoint=function(){for(var a=this.chart.highlightedPoint,c=a.series===this?a.index:0,a=this.points,d=c,b=a.length;d<b;++d)if(!m(a[d]))return a[d].highlight();for(;0<=c;--c)if(!m(a[c]))return a[c].highlight();return!1};e.Chart.prototype.highlightAdjacentSeries=function(a){var c,d,b=this.highlightedPoint,g=(c=this.series&&this.series[this.series.length-1])&&c.points&&c.points[c.points.length-1];if(!this.highlightedPoint)return c=a?this.series&&this.series[0]:
c,(d=a?c&&c.points&&c.points[0]:g)?d.highlight():!1;c=this.series[b.series.index+(a?-1:1)];if(!c)return!1;a:{var g=Infinity,f,e=c.points.length;if(void 0===b.plotX||void 0===b.plotY)d=void 0;else{for(;e--;){f=c.points[e];if(void 0===f.plotX||void 0===f.plotY){d=void 0;break a}f=(b.plotX-f.plotX)*(b.plotX-f.plotX)*4+(b.plotY-f.plotY)*(b.plotY-f.plotY)*1;f<g&&(g=f,d=e)}d=c.points[d||0]}}if(!d)return!1;if(!c.visible)return d.highlight(),a=this.highlightAdjacentSeries(a),a?a:(b.highlight(),!1);d.highlight();
return d.series.highlightFirstValidPoint()};e.Chart.prototype.highlightAdjacentPointVertical=function(a){var c=this.highlightedPoint,d=Infinity,b;if(void 0===c.plotX||void 0===c.plotY)return!1;h(this.series,function(g){h(g.points,function(f){if(void 0!==f.plotY&&void 0!==f.plotX&&f!==c){var e=f.plotY-c.plotY,n=Math.abs(f.plotX-c.plotX),n=Math.abs(e)*Math.abs(e)+n*n*4;g.yAxis.reversed&&(e*=-1);!(0>e&&a||0<e&&!a||5>n||m(f))&&n<d&&(d=n,b=f)}})});return b?b.highlight():!1};e.Chart.prototype.showExportMenu=
function(){this.exportSVGElements&&this.exportSVGElements[0]&&(this.exportSVGElements[0].element.onclick(),this.highlightExportItem(0))};e.Chart.prototype.highlightExportItem=function(a){var c=this.exportDivElements&&this.exportDivElements[a],d=this.exportDivElements&&this.exportDivElements[this.highlightedExportItem];if(c&&"DIV"===c.tagName&&(!c.children||!c.children.length)){c.focus&&c.focus();if(d&&d.onmouseout)d.onmouseout();if(c.onmouseover)c.onmouseover();this.highlightedExportItem=a;return!0}};
e.Chart.prototype.highlightRangeSelectorButton=function(a){var c=this.rangeSelector.buttons;c[this.highlightedRangeSelectorItemIx]&&c[this.highlightedRangeSelectorItemIx].setState(this.oldRangeSelectorItemState||0);this.highlightedRangeSelectorItemIx=a;return c[a]?(c[a].element.focus&&c[a].element.focus(),this.oldRangeSelectorItemState=c[a].state,c[a].setState(2),!0):!1};e.Chart.prototype.highlightLegendItem=function(a){var c=this.legend.allItems;c[this.highlightedLegendItemIx]&&y(c[this.highlightedLegendItemIx].legendGroup.element,
"mouseout");this.highlightedLegendItemIx=a;return c[a]?(c[a].legendGroup.element.focus&&c[a].legendGroup.element.focus(),y(c[a].legendGroup.element,"mouseover"),!0):!1};e.Chart.prototype.hideExportMenu=function(){var a=this.exportDivElements;if(a){h(a,function(a){y(a,"mouseleave")});if(a[this.highlightedExportItem]&&a[this.highlightedExportItem].onmouseout)a[this.highlightedExportItem].onmouseout();this.highlightedExportItem=0;this.renderTo.focus()}};e.Chart.prototype.addKeyboardNavEvents=function(){function a(b){this.id=
b.id;this.keyCodeMap=b.keyCodeMap;this.move=b.move;this.validate=b.validate;this.init=b.init;this.terminate=b.terminate}function c(c,d,e){return new a(v({keyCodeMap:d,move:function(a){this.terminate&&this.terminate(a);b.keyboardNavigationModuleIndex+=a;var c=b.keyboardNavigationModules[b.keyboardNavigationModuleIndex];if(c){if(c.validate&&!c.validate())return this.move(a);if(c.init)return c.init(a),!0}b.keyboardNavigationModuleIndex=0;0<a?b.tabExitAnchor.focus():b.renderTo.focus();return!1}},{id:c},
e))}function d(a){a=a||A.event;var c=b.keyboardNavigationModules[b.keyboardNavigationModuleIndex];c&&c.run(a)&&a.preventDefault()}var b=this;a.prototype={run:function(b){var a=this,c=b.which||b.keyCode,d=!1,g=!1;h(this.keyCodeMap,function(f){-1<f[0].indexOf(c)&&(d=!0,g=!1===f[1].call(a,c,b)?!1:!0)});d||9!==c||(g=this.move(b.shiftKey?-1:1));return g}};b.keyboardNavigationModules=[c("entry",[]),c("points",[[[37,39],function(a){b.highlightAdjacentPoint(39===a);return!0}],[[38,40],function(a){b[b.highlightedPoint&&
b.highlightedPoint.series.keyboardMoveVertical?"highlightAdjacentPointVertical":"highlightAdjacentSeries"](38!==a);return!0}],[[13,32],function(){b.highlightedPoint&&b.highlightedPoint.firePointEvent("click")}]],{init:function(){delete b.highlightedPoint;for(var a=0;a<b.series.length;++a)for(var c=0,d=b.series[a].points&&b.series[a].points.length;c<d;++c)if(!m(b.series[a].points[c]))return b.series[a].points[c].highlight()},terminate:function(){b.tooltip&&b.tooltip.hide(0);delete b.highlightedPoint}}),
c("exporting",[[[37,38],function(){for(var a=b.highlightedExportItem||0,c=!0;a--;)if(b.highlightExportItem(a)){c=!1;break}if(c)return b.hideExportMenu(),this.move(-1)}],[[39,40],function(){for(var a=!0,c=(b.highlightedExportItem||0)+1;c<b.exportDivElements.length;++c)if(b.highlightExportItem(c)){a=!1;break}if(a)return b.hideExportMenu(),this.move(1)}],[[13,32],function(){r(b.exportDivElements[b.highlightedExportItem])}]],{validate:function(){return b.exportChart&&!(b.options.exporting&&!1===b.options.exporting.enabled)},
init:function(a){b.highlightedPoint=null;b.showExportMenu();if(0>a&&b.exportDivElements)for(a=b.exportDivElements.length;-1<a&&!b.highlightExportItem(a);--a);},terminate:function(){b.hideExportMenu()}}),c("mapZoom",[[[38,40,37,39],function(a){b[38===a||40===a?"yAxis":"xAxis"][0].panStep(39>a?-1:1)}],[[9],function(a,c){b.mapNavButtons[b.focusedMapNavButtonIx].setState(0);if(c.shiftKey&&!b.focusedMapNavButtonIx||!c.shiftKey&&b.focusedMapNavButtonIx)return b.mapZoom(),this.move(c.shiftKey?-1:1);b.focusedMapNavButtonIx+=
c.shiftKey?-1:1;a=b.mapNavButtons[b.focusedMapNavButtonIx];a.element.focus&&a.element.focus();a.setState(2)}],[[13,32],function(){r(b.mapNavButtons[b.focusedMapNavButtonIx].element)}]],{validate:function(){return b.mapZoom&&b.mapNavButtons&&2===b.mapNavButtons.length},init:function(a){var c=b.mapNavButtons[0],d=b.mapNavButtons[1],c=0<a?c:d;h(b.mapNavButtons,function(a,b){a.element.setAttribute("tabindex",-1);a.element.setAttribute("role","button");a.element.setAttribute("aria-label","Zoom "+(b?"out":
"")+"chart")});c.element.focus&&c.element.focus();c.setState(2);b.focusedMapNavButtonIx=0<a?0:1}}),c("rangeSelector",[[[37,39,38,40],function(a){a=37===a||38===a?-1:1;if(!b.highlightRangeSelectorButton(b.highlightedRangeSelectorItemIx+a))return this.move(a)}],[[13,32],function(){3!==b.oldRangeSelectorItemState&&r(b.rangeSelector.buttons[b.highlightedRangeSelectorItemIx].element)}]],{validate:function(){return b.rangeSelector&&b.rangeSelector.buttons&&b.rangeSelector.buttons.length},init:function(a){h(b.rangeSelector.buttons,
function(a){a.element.setAttribute("tabindex","-1");a.element.setAttribute("role","button");a.element.setAttribute("aria-label","Select range "+(a.text&&a.text.textStr))});b.highlightRangeSelectorButton(0<a?0:b.rangeSelector.buttons.length-1)}}),c("rangeSelectorInput",[[[9,38,40],function(a,c){a=9===a&&c.shiftKey||38===a?-1:1;c=b.highlightedInputRangeIx+=a;if(1<c||0>c)return this.move(a);b.rangeSelector[c?"maxInput":"minInput"].focus()}]],{validate:function(){return b.rangeSelector&&b.rangeSelector.inputGroup&&
"hidden"!==b.rangeSelector.inputGroup.element.getAttribute("visibility")&&!1!==b.options.rangeSelector.inputEnabled&&b.rangeSelector.minInput&&b.rangeSelector.maxInput},init:function(a){b.highlightedInputRangeIx=0<a?0:1;b.rangeSelector[b.highlightedInputRangeIx?"maxInput":"minInput"].focus()}}),c("legend",[[[37,39,38,40],function(a){a=37===a||38===a?-1:1;if(!b.highlightLegendItem(b.highlightedLegendItemIx+a))return this.move(a)}],[[13,32],function(){r(b.legend.allItems[b.highlightedLegendItemIx].legendItem.element.parentNode)}]],
{validate:function(){return b.legend&&b.legend.allItems&&!(b.colorAxis&&b.colorAxis.length)&&!1!==(b.options.legend&&b.options.legend.keyboardNavigation&&b.options.legend.keyboardNavigation.enabled)},init:function(a){h(b.legend.allItems,function(a){a.legendGroup.element.setAttribute("tabindex","-1");a.legendGroup.element.setAttribute("role","button");a.legendGroup.element.setAttribute("aria-label","Toggle visibility of series "+a.name)});b.highlightLegendItem(0<a?0:b.legend.allItems.length-1)}})];
b.keyboardNavigationModuleIndex=0;b.container.hasAttribute&&!b.container.hasAttribute("tabIndex")&&b.container.setAttribute("tabindex","0");b.tabExitAnchor||(b.tabExitAnchor=l.createElement("div"),b.tabExitAnchor.setAttribute("tabindex","-1"),v(!0,b.tabExitAnchor.style,z),b.renderTo.appendChild(b.tabExitAnchor));x(b.renderTo,"keydown",d);x(b,"destroy",function(){D(b.renderTo,"keydown",d)})};e.Chart.prototype.addScreenReaderRegion=function(a,c){var d=this,b=d.series,e=d.options,f=e.accessibility,h=
d.screenReaderRegion=l.createElement("div"),n=l.createElement("h4"),p=l.createElement("a"),m=l.createElement("h4"),k=d.types||[],k=(1===k.length&&"pie"===k[0]||"map"===k[0])&&{}||d.getAxesDescription(),u=b[0]&&t[b[0].type]||t["default"];h.setAttribute("id",a);h.setAttribute("role","region");h.setAttribute("aria-label","Chart screen reader information.");h.innerHTML=f.screenReaderSectionFormatter&&f.screenReaderSectionFormatter(d)||"\x3cdiv\x3eUse regions/landmarks to skip ahead to chart"+(1<b.length?
" and navigate between data series":"")+".\x3c/div\x3e\x3ch3\x3e"+(e.title.text?q(e.title.text):"Chart")+(e.subtitle&&e.subtitle.text?". "+q(e.subtitle.text):"")+"\x3c/h3\x3e\x3ch4\x3eLong description.\x3c/h4\x3e\x3cdiv\x3e"+(e.chart.description||"No description available.")+"\x3c/div\x3e\x3ch4\x3eStructure.\x3c/h4\x3e\x3cdiv\x3eChart type: "+(e.chart.typeDescription||d.getTypeDescription())+"\x3c/div\x3e"+(1===b.length?"\x3cdiv\x3e"+u[0]+" with "+b[0].points.length+" "+(1===b[0].points.length?u[1]:
u[2])+".\x3c/div\x3e":"")+(k.xAxis?"\x3cdiv\x3e"+k.xAxis+"\x3c/div\x3e":"")+(k.yAxis?"\x3cdiv\x3e"+k.yAxis+"\x3c/div\x3e":"");d.getCSV&&(p.innerHTML="View as data table.",p.href="#"+c,p.setAttribute("tabindex","-1"),p.onclick=f.onTableAnchorClick||function(){d.viewData();l.getElementById(c).focus()},n.appendChild(p),h.appendChild(n));m.innerHTML="Chart graphic.";d.renderTo.insertBefore(m,d.renderTo.firstChild);d.renderTo.insertBefore(h,d.renderTo.firstChild);v(!0,m.style,z);v(!0,h.style,z)};e.Chart.prototype.callbacks.push(function(a){var c=
a.options,d=c.accessibility;if(d.enabled){var b=l.createElementNS("http://www.w3.org/2000/svg","title"),g=l.createElementNS("http://www.w3.org/2000/svg","g"),f=a.container.getElementsByTagName("desc")[0],m=a.container.getElementsByTagName("text"),n="highcharts-title-"+a.index,p="highcharts-data-table-"+a.index,r="highcharts-information-region-"+a.index,k=c.title.text||"Chart",u=c.exporting&&c.exporting.csv&&c.exporting.csv.columnHeaderFormatter,w=[];b.textContent=q(k);b.id=n;f.parentNode.insertBefore(b,
f);a.renderTo.setAttribute("role","region");a.renderTo.setAttribute("aria-label","Interactive chart. "+k+". Use up and down arrows to navigate with most screen readers.");if(a.exportSVGElements&&a.exportSVGElements[0]&&a.exportSVGElements[0].element){var t=a.exportSVGElements[0].element.onclick,b=a.exportSVGElements[0].element.parentNode;a.exportSVGElements[0].element.onclick=function(){t.apply(this,Array.prototype.slice.call(arguments));a.addAccessibleContextMenuAttribs();a.highlightExportItem(0)};
a.exportSVGElements[0].element.setAttribute("role","button");a.exportSVGElements[0].element.setAttribute("aria-label","View export menu");g.appendChild(a.exportSVGElements[0].element);g.setAttribute("role","region");g.setAttribute("aria-label","Chart export menu");b.appendChild(g)}a.rangeSelector&&h(["minInput","maxInput"],function(b,c){a.rangeSelector[b]&&(a.rangeSelector[b].setAttribute("tabindex","-1"),a.rangeSelector[b].setAttribute("role","textbox"),a.rangeSelector[b].setAttribute("aria-label",
"Select "+(c?"end":"start")+" date."))});h(m,function(a){a.setAttribute("aria-hidden","true")});a.addScreenReaderRegion(r,p);d.keyboardNavigation.enabled&&a.addKeyboardNavEvents();v(!0,c.exporting,{csv:{columnHeaderFormatter:function(a,b,c){if(!a)return"Category";if(a instanceof e.Axis)return a.options.title&&a.options.title.text||(a.isDatetimeAxis?"DateTime":"Category");var d=w[w.length-1];1<c&&(d&&d.text)!==a.name&&w.push({text:a.name,span:c});return u?u.call(this,a,b,c):1<c?b:a.name}}});e.wrap(a,
"getTable",function(a){return a.apply(this,Array.prototype.slice.call(arguments,1)).replace("\x3ctable\x3e",'\x3ctable id\x3d"'+p+'" summary\x3d"Table representation of chart"\x3e\x3ccaption\x3e'+k+"\x3c/caption\x3e")});e.wrap(a,"viewData",function(a){if(!this.dataTableDiv){a.apply(this,Array.prototype.slice.call(arguments,1));var b=l.getElementById(p),c=b.getElementsByTagName("thead")[0],d=b.getElementsByTagName("tbody")[0],e=c.firstChild.children,f="\x3ctr\x3e\x3ctd\x3e\x3c/td\x3e",g,k;b.setAttribute("tabindex",
"-1");h(d.children,function(a){g=a.firstChild;k=l.createElement("th");k.setAttribute("scope","row");k.innerHTML=g.innerHTML;g.parentNode.replaceChild(k,g)});h(e,function(a){"TH"===a.tagName&&a.setAttribute("scope","col")});w.length&&(h(w,function(a){f+='\x3cth scope\x3d"col" colspan\x3d"'+a.span+'"\x3e'+a.text+"\x3c/th\x3e"}),c.insertAdjacentHTML("afterbegin",f))}})}})})(q)});