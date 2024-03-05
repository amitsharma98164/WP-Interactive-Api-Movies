"use strict";(self.webpackChunk_experimentalInteractivity=self.webpackChunk_experimentalInteractivity||[]).push([[29],{127:function(t,e,n){n.r(e);var r=n(396),o=n(944),i=n(961),c=n(678),s=n(584);const a=t=>{const e=document.querySelector('[data-testid="execution order"]');e.textContent?e.textContent+=`, ${t}`:e.textContent=t};(0,c.X)("test-context",(({context:{Provider:t},props:{children:e}})=>{a("context");const n=(0,o.Aj)({attribute:"from context",text:"from context"});return(0,s.tZ)(t,{value:n,children:e})}),{priority:8}),(0,c.X)("test-attribute",(({context:t,evaluate:e,element:n})=>{a("attribute");const o=e("context.attribute",{context:(0,r.qp)(t)});(0,r.d4)((()=>{n.ref.current.setAttribute("data-attribute",o)}),[]),n.props["data-attribute"]=o})),(0,c.X)("test-text",(({context:t,evaluate:e,element:n})=>{a("text");const o=e("context.text",{context:(0,r.qp)(t)});n.props.children=(0,s.tZ)("p",{"data-testid":"text",children:o})}),{priority:12}),(0,c.X)("test-children",(({context:t,evaluate:e,element:n})=>{a("children");const o=(0,r.qp)(t);n.props.children=(0,s.BX)("div",{children:[n.props.children,(0,s.tZ)("button",{onClick:()=>{e("actions.updateAttribute",{context:o})},children:"Update attribute"}),(0,s.tZ)("button",{onClick:()=>{e("actions.updateText",{context:o})},children:"Update text"})]})}),{priority:14}),(0,i.h)({actions:{updateText({context:t}){t.text="updated"},updateAttribute({context:t}){t.attribute="updated"}}})},678:function(t,e,n){n.d(e,{X:function(){return p}});var r=n(400),o=n(396),i=n(961),c=n(584);const s=(0,r.kr)({}),a={},u={},p=(t,e,{priority:n=10}={})=>{a[t]=e,u[t]=n},d=({type:t,directives:e,props:n})=>{const s=(0,o.sO)(null),a=(0,r.h)(t,{...n,ref:s}),p=(0,o.Ye)((()=>(({ref:t}={})=>(e,n={})=>{const r="!"===e[0]&&!!(e=e.slice(1)),o=((t,e)=>{let n={...i.ZG,context:e};return t.split(".").forEach((t=>n=n[t])),n})(e,n.context),c="function"==typeof o?o({ref:t.current,...i.ZG,...n}):o;return r?!c:c})({ref:s})),[]),d=(t=>(0,o.Ye)((()=>{const e=Object.entries(t).reduce(((t,[e,n])=>{const r=u[e];return t[r]||(t[r]={}),t[r][e]=n,t}),{});return Object.entries(e).sort((([t],[e])=>t-e)).map((([,t])=>t))}),[t]))(e);return(0,c.tZ)(l,{directives:d,element:a,evaluate:p,originalProps:n})},l=({directives:[t,...e],element:n,evaluate:o,originalProps:i})=>{n=(0,r.Tm)(n);const u=e.length>0?(0,c.tZ)(l,{directives:e,element:n,evaluate:o,originalProps:i}):n,p={...i,children:u},d={directives:t,props:p,element:n,context:s,evaluate:o};for(const e in t){const t=a[e]?.(d);void 0!==t&&(p.children=t)}return p.children},x=r.YM.vnode;r.YM.vnode=t=>{if(t.props.__directives){const e=t.props,n=e.__directives;delete e.__directives,t.props={type:t.type,directives:n,props:e},t.type=d}x&&x(t)}},961:function(t,e,n){n.d(e,{ZG:function(){return s},h:function(){return a}});var r=n(944);const o=t=>t&&"object"==typeof t&&!Array.isArray(t),i=(t,e)=>{if(o(t)&&o(e))for(const n in e)o(e[n])?(t[n]||Object.assign(t,{[n]:{}}),i(t[n],e[n])):Object.assign(t,{[n]:e[n]})},c=(()=>{const t=document.querySelector('script[type="application/json"]#store');if(!t)return{};try{const{state:e}=JSON.parse(t.textContent);if(o(e))return e;throw Error("Parsed state is not an object")}catch(t){console.log(t)}return{}})(),s={state:(0,r.Aj)(c)};"undefined"!=typeof window&&(window.store=s);const a=({state:t,...e})=>{i(s,e),i(c,t)}}},function(t){var e=(127,t(t.s=127));window.__experimentalInteractivity=e}]);
//# sourceMappingURL=directive-priorities.js.map