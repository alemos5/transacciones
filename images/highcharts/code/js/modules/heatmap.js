/*
 Highcharts JS v6.0.7 (2018-02-16)

 (c) 2009-2017 Torstein Honsi

 License: www.highcharts.com/license
*/
(function(k){"object"===typeof module&&module.exports?module.exports=k:k(Highcharts)})(function(k){(function(b){var g=b.Axis,w=b.Chart,n=b.color,p,h=b.each,t=b.extend,u=b.isNumber,q=b.Legend,l=b.LegendSymbolMixin,e=b.noop,r=b.merge,k=b.pick,v=b.wrap;b.ColorAxis||(p=b.ColorAxis=function(){this.init.apply(this,arguments)},t(p.prototype,g.prototype),t(p.prototype,{defaultColorAxisOptions:{lineWidth:0,minPadding:0,maxPadding:0,gridLineWidth:1,tickPixelInterval:72,startOnTick:!0,endOnTick:!0,offset:0,
marker:{animation:{duration:50},width:.01},labels:{overflow:"justify",rotation:0},minColor:"#e6ebf5",maxColor:"#003399",tickLength:5,showInLegend:!0},keepProps:["legendGroup","legendItemHeight","legendItemWidth","legendItem","legendSymbol"].concat(g.prototype.keepProps),init:function(a,c){var d="vertical"!==a.options.legend.layout,m;this.coll="colorAxis";m=r(this.defaultColorAxisOptions,{side:d?2:1,reversed:!d},c,{opposite:!d,showEmpty:!1,title:null,visible:a.options.legend.enabled});g.prototype.init.call(this,
a,m);c.dataClasses&&this.initDataClasses(c);this.initStops();this.horiz=d;this.zoomEnabled=!1;this.defaultLegendLength=200},initDataClasses:function(a){var c,d=0,m=this.chart.options.chart.colorCount,f=this.options,b=a.dataClasses.length;this.dataClasses=c=[];this.legendItems=[];h(a.dataClasses,function(a,l){a=r(a);c.push(a);"category"===f.dataClassColor?(a.colorIndex=d,d++,d===m&&(d=0)):a.color=n(f.minColor).tweenTo(n(f.maxColor),2>b?.5:l/(b-1))})},setTickPositions:function(){if(!this.dataClasses)return g.prototype.setTickPositions.call(this)},
initStops:function(){this.stops=this.options.stops||[[0,this.options.minColor],[1,this.options.maxColor]];h(this.stops,function(a){a.color=n(a[1])})},setOptions:function(a){g.prototype.setOptions.call(this,a);this.options.crosshair=this.options.marker},setAxisSize:function(){var a=this.legendSymbol,c=this.chart,d=c.options.legend||{},m,f;a?(this.left=d=a.attr("x"),this.top=m=a.attr("y"),this.width=f=a.attr("width"),this.height=a=a.attr("height"),this.right=c.chartWidth-d-f,this.bottom=c.chartHeight-
m-a,this.len=this.horiz?f:a,this.pos=this.horiz?d:m):this.len=(this.horiz?d.symbolWidth:d.symbolHeight)||this.defaultLegendLength},normalizedValue:function(a){this.isLog&&(a=this.val2lin(a));return 1-(this.max-a)/(this.max-this.min||1)},toColor:function(a,c){var d=this.stops,m,f,b=this.dataClasses,l,e;if(b)for(e=b.length;e--;){if(l=b[e],m=l.from,d=l.to,(void 0===m||a>=m)&&(void 0===d||a<=d)){c&&(c.dataClass=e,c.colorIndex=l.colorIndex);break}}else{a=this.normalizedValue(a);for(e=d.length;e--&&!(a>
d[e][0]););m=d[e]||d[e+1];d=d[e+1]||m;a=1-(d[0]-a)/(d[0]-m[0]||1);f=m.color.tweenTo(d.color,a)}return f},getOffset:function(){var a=this.legendGroup,c=this.chart.axisOffset[this.side];a&&(this.axisParent=a,g.prototype.getOffset.call(this),this.added||(this.added=!0,this.labelLeft=0,this.labelRight=this.width),this.chart.axisOffset[this.side]=c)},setLegendColor:function(){var a,c=this.reversed;a=c?1:0;c=c?0:1;a=this.horiz?[a,0,c,0]:[0,c,0,a];this.legendColor={linearGradient:{x1:a[0],y1:a[1],x2:a[2],
y2:a[3]},stops:this.stops}},drawLegendSymbol:function(a,c){var d=a.padding,b=a.options,f=this.horiz,l=k(b.symbolWidth,f?this.defaultLegendLength:12),e=k(b.symbolHeight,f?12:this.defaultLegendLength),h=k(b.labelPadding,f?16:30),b=k(b.itemDistance,10);this.setLegendColor();c.legendSymbol=this.chart.renderer.rect(0,a.baseline-11,l,e).attr({zIndex:1}).add(c.legendGroup);this.legendItemWidth=l+d+(f?b:h);this.legendItemHeight=e+d+(f?h:0)},setState:function(a){h(this.series,function(c){c.setState(a)})},
visible:!0,setVisible:e,getSeriesExtremes:function(){var a=this.series,c=a.length;this.dataMin=Infinity;for(this.dataMax=-Infinity;c--;)void 0!==a[c].valueMin&&(this.dataMin=Math.min(this.dataMin,a[c].valueMin),this.dataMax=Math.max(this.dataMax,a[c].valueMax))},drawCrosshair:function(a,c){var d=c&&c.plotX,b=c&&c.plotY,f,l=this.pos,e=this.len;c&&(f=this.toPixels(c[c.series.colorKey]),f<l?f=l-2:f>l+e&&(f=l+e+2),c.plotX=f,c.plotY=this.len-f,g.prototype.drawCrosshair.call(this,a,c),c.plotX=d,c.plotY=
b,this.cross&&!this.cross.addedToColorAxis&&this.legendGroup&&(this.cross.addClass("highcharts-coloraxis-marker").add(this.legendGroup),this.cross.addedToColorAxis=!0))},getPlotLinePath:function(a,c,d,b,f){return u(f)?this.horiz?["M",f-4,this.top-6,"L",f+4,this.top-6,f,this.top,"Z"]:["M",this.left,f,"L",this.left-6,f+6,this.left-6,f-6,"Z"]:g.prototype.getPlotLinePath.call(this,a,c,d,b)},update:function(a,c){var d=this.chart,b=d.legend;h(this.series,function(a){a.isDirtyData=!0});a.dataClasses&&b.allItems&&
(h(b.allItems,function(a){a.isDataClass&&a.legendGroup&&a.legendGroup.destroy()}),d.isDirtyLegend=!0);d.options[this.coll]=r(this.userOptions,a);g.prototype.update.call(this,a,c);this.legendItem&&(this.setLegendColor(),b.colorizeItem(this,!0))},remove:function(){this.legendItem&&this.chart.legend.destroyItem(this);g.prototype.remove.call(this)},getDataClassLegendSymbols:function(){var a=this,c=this.chart,d=this.legendItems,m=c.options.legend,f=m.valueDecimals,p=m.valueSuffix||"",g;d.length||h(this.dataClasses,
function(m,q){var k=!0,r=m.from,n=m.to;g="";void 0===r?g="\x3c ":void 0===n&&(g="\x3e ");void 0!==r&&(g+=b.numberFormat(r,f)+p);void 0!==r&&void 0!==n&&(g+=" - ");void 0!==n&&(g+=b.numberFormat(n,f)+p);d.push(t({chart:c,name:g,options:{},drawLegendSymbol:l.drawRectangle,visible:!0,setState:e,isDataClass:!0,setVisible:function(){k=this.visible=!k;h(a.series,function(a){h(a.points,function(a){a.dataClass===q&&a.setVisible(k)})});c.legend.colorizeItem(this,k)}},m))});return d},name:""}),h(["fill","stroke"],
function(a){b.Fx.prototype[a+"Setter"]=function(){this.elem.attr(a,n(this.start).tweenTo(n(this.end),this.pos),null,!0)}}),v(w.prototype,"getAxes",function(a){var c=this.options.colorAxis;a.call(this);this.colorAxis=[];c&&new p(this,c)}),v(q.prototype,"getAllItems",function(a){var c=[],d=this.chart.colorAxis[0];d&&d.options&&(d.options.showInLegend&&(d.options.dataClasses?c=c.concat(d.getDataClassLegendSymbols()):c.push(d)),h(d.series,function(a){a.options.showInLegend=!1}));return c.concat(a.call(this))}),
v(q.prototype,"colorizeItem",function(a,c,d){a.call(this,c,d);d&&c.legendColor&&c.legendSymbol.attr({fill:c.legendColor})}),v(q.prototype,"update",function(a){a.apply(this,[].slice.call(arguments,1));this.chart.colorAxis[0]&&this.chart.colorAxis[0].update({},arguments[2])}))})(k);(function(b){var g=b.defined,k=b.each,n=b.noop;b.colorPointMixin={isValid:function(){return null!==this.value&&Infinity!==this.value&&-Infinity!==this.value},setVisible:function(b){var h=this,g=b?"show":"hide";k(["graphic",
"dataLabel"],function(b){if(h[b])h[b][g]()})},setState:function(g){b.Point.prototype.setState.call(this,g);this.graphic&&this.graphic.attr({zIndex:"hover"===g?1:0})}};b.colorSeriesMixin={pointArrayMap:["value"],axisTypes:["xAxis","yAxis","colorAxis"],optionalAxis:"colorAxis",trackerGroups:["group","markerGroup","dataLabelsGroup"],getSymbol:n,parallelArrays:["x","y","value"],colorKey:"value",translateColors:function(){var b=this,g=this.options.nullColor,n=this.colorAxis,u=this.colorKey;k(this.data,
function(h){var l=h[u];if(l=h.options.color||(h.isNull?g:n&&void 0!==l?n.toColor(l,h):h.color||b.color))h.color=l})},colorAttribs:function(b){var h={};g(b.color)&&(h[this.colorProp||"fill"]=b.color);return h}}})(k);(function(b){var g=b.colorPointMixin,k=b.each,n=b.merge,p=b.noop,h=b.pick,t=b.Series,u=b.seriesType,q=b.seriesTypes;u("heatmap","scatter",{animation:!1,borderWidth:0,dataLabels:{formatter:function(){return this.point.value},inside:!0,verticalAlign:"middle",crop:!1,overflow:!1,padding:0},
marker:null,pointRange:null,tooltip:{pointFormat:"{point.x}, {point.y}: {point.value}\x3cbr/\x3e"},states:{hover:{halo:!1,brightness:.2}}},n(b.colorSeriesMixin,{pointArrayMap:["y","value"],hasPointSpecificOptions:!0,getExtremesFromAll:!0,directTouch:!0,init:function(){var b;q.scatter.prototype.init.apply(this,arguments);b=this.options;b.pointRange=h(b.pointRange,b.colsize||1);this.yAxis.axisPointRange=b.rowsize||1},translate:function(){var b=this.options,e=this.xAxis,g=this.yAxis,n=b.pointPadding||
0,p=function(a,b,d){return Math.min(Math.max(b,a),d)};this.generatePoints();k(this.points,function(a){var c=(b.colsize||1)/2,d=(b.rowsize||1)/2,l=p(Math.round(e.len-e.translate(a.x-c,0,1,0,1)),-e.len,2*e.len),c=p(Math.round(e.len-e.translate(a.x+c,0,1,0,1)),-e.len,2*e.len),f=p(Math.round(g.translate(a.y-d,0,1,0,1)),-g.len,2*g.len),d=p(Math.round(g.translate(a.y+d,0,1,0,1)),-g.len,2*g.len),k=h(a.pointPadding,n);a.plotX=a.clientX=(l+c)/2;a.plotY=(f+d)/2;a.shapeType="rect";a.shapeArgs={x:Math.min(l,
c)+k,y:Math.min(f,d)+k,width:Math.abs(c-l)-2*k,height:Math.abs(d-f)-2*k}});this.translateColors()},drawPoints:function(){q.column.prototype.drawPoints.call(this);k(this.points,function(b){b.graphic.css(this.colorAttribs(b))},this)},animate:p,getBox:p,drawLegendSymbol:b.LegendSymbolMixin.drawRectangle,alignDataLabel:q.column.prototype.alignDataLabel,getExtremes:function(){t.prototype.getExtremes.call(this,this.valueData);this.valueMin=this.dataMin;this.valueMax=this.dataMax;t.prototype.getExtremes.call(this)}}),
b.extend({haloPath:function(b){if(!b)return[];var e=this.shapeArgs;return["M",e.x-b,e.y-b,"L",e.x-b,e.y+e.height+b,e.x+e.width+b,e.y+e.height+b,e.x+e.width+b,e.y-b,"Z"]}},g))})(k)});
