Timeline.SpanHighlightDecorator=function(a){this._unit=a.unit!=null?a.unit:SimileAjax.NativeDateUnit;this._startDate=typeof a.startDate=="string"?this._unit.parseFromObject(a.startDate):a.startDate;this._endDate=typeof a.endDate=="string"?this._unit.parseFromObject(a.endDate):a.endDate;this._startLabel=a.startLabel!=null?a.startLabel:"";this._endLabel=a.endLabel!=null?a.endLabel:"";this._color=a.color;this._cssClass=a.cssClass!=null?a.cssClass:null;this._opacity=a.opacity!=null?a.opacity:100;this._zIndex=
a.inFront!=null&&a.inFront?113:10};Timeline.SpanHighlightDecorator.prototype.initialize=function(a,b){this._band=a;this._timeline=b;this._layerDiv=null};
Timeline.SpanHighlightDecorator.prototype.paint=function(){this._layerDiv!=null&&this._band.removeLayerDiv(this._layerDiv);this._layerDiv=this._band.createLayerDiv(this._zIndex);this._layerDiv.setAttribute("name","span-highlight-decorator");this._layerDiv.style.display="none";var a=this._band.getMinDate(),b=this._band.getMaxDate();if(this._unit.compare(this._startDate,b)<0&&this._unit.compare(this._endDate,a)>0){var a=this._unit.later(a,this._startDate),b=this._unit.earlier(b,this._endDate),a=this._band.dateToPixelOffset(a),
b=this._band.dateToPixelOffset(b),g=this._timeline.getDocument(),c=function(){var a=g.createElement("table");a.insertRow(0).insertCell(0);return a},d=g.createElement("div");d.className="timeline-highlight-decorator";this._cssClass&&(d.className+=" "+this._cssClass);if(this._color!=null)d.style.backgroundColor=this._color;this._opacity<100&&SimileAjax.Graphics.setOpacity(d,this._opacity);this._layerDiv.appendChild(d);var e=c();e.className="timeline-highlight-label timeline-highlight-label-start";var f=
e.rows[0].cells[0];f.innerHTML=this._startLabel;if(this._cssClass)f.className="label_"+this._cssClass;this._layerDiv.appendChild(e);c=c();c.className="timeline-highlight-label timeline-highlight-label-end";f=c.rows[0].cells[0];f.innerHTML=this._endLabel;if(this._cssClass)f.className="label_"+this._cssClass;this._layerDiv.appendChild(c);this._timeline.isHorizontal()?(d.style.left=a+"px",d.style.width=b-a+"px",e.style.right=this._band.getTotalViewLength()-a+"px",e.style.width=this._startLabel.length+
"em",c.style.left=b+"px",c.style.width=this._endLabel.length+"em"):(d.style.top=a+"px",d.style.height=b-a+"px",e.style.bottom=a+"px",e.style.height="1.5px",c.style.top=b+"px",c.style.height="1.5px")}this._layerDiv.style.display="block"};Timeline.SpanHighlightDecorator.prototype.softPaint=function(){};
Timeline.PointHighlightDecorator=function(a){this._unit=a.unit!=null?a.unit:SimileAjax.NativeDateUnit;this._date=typeof a.date=="string"?this._unit.parseFromObject(a.date):a.date;this._width=a.width!=null?a.width:10;this._color=a.color;this._cssClass=a.cssClass!=null?a.cssClass:"";this._opacity=a.opacity!=null?a.opacity:100};Timeline.PointHighlightDecorator.prototype.initialize=function(a,b){this._band=a;this._timeline=b;this._layerDiv=null};
Timeline.PointHighlightDecorator.prototype.paint=function(){this._layerDiv!=null&&this._band.removeLayerDiv(this._layerDiv);this._layerDiv=this._band.createLayerDiv(10);this._layerDiv.setAttribute("name","span-highlight-decorator");this._layerDiv.style.display="none";var a=this._band.getMinDate();if(this._unit.compare(this._date,this._band.getMaxDate())<0&&this._unit.compare(this._date,a)>0){var a=this._band.dateToPixelOffset(this._date)-Math.round(this._width/2),b=this._timeline.getDocument().createElement("div");
b.className="timeline-highlight-point-decorator";b.className+=" "+this._cssClass;if(this._color!=null)b.style.backgroundColor=this._color;this._opacity<100&&SimileAjax.Graphics.setOpacity(b,this._opacity);this._layerDiv.appendChild(b);this._timeline.isHorizontal()?(b.style.left=a+"px",b.style.width=this._width):(b.style.top=a+"px",b.style.height=this._width)}this._layerDiv.style.display="block"};Timeline.PointHighlightDecorator.prototype.softPaint=function(){};
