'use strict';

var cibMysql = ["32 32", "<path d='M21.875 7.568c-0.156 0-0.26 0.021-0.365 0.047v0.016h0.016c0.073 0.135 0.193 0.24 0.286 0.365 0.073 0.141 0.135 0.286 0.203 0.427l0.021-0.021c0.125-0.089 0.188-0.229 0.188-0.443-0.052-0.063-0.063-0.13-0.109-0.188-0.052-0.089-0.167-0.135-0.24-0.203zM7.693 25.161h-1.234c-0.042-2.083-0.167-4.042-0.359-5.88h-0.010l-1.88 5.88h-0.943l-1.865-5.88h-0.016c-0.135 1.76-0.224 3.724-0.26 5.88h-1.125c0.073-2.625 0.255-5.083 0.547-7.375h1.531l1.781 5.417h0.010l1.797-5.417h1.458c0.323 2.688 0.516 5.146 0.573 7.375zM13.047 19.719c-0.5 2.729-1.167 4.714-1.984 5.948-0.646 0.953-1.349 1.432-2.115 1.432-0.203 0-0.453-0.063-0.755-0.188v-0.656c0.151 0.021 0.323 0.036 0.516 0.036 0.359 0 0.646-0.104 0.865-0.297 0.26-0.24 0.391-0.51 0.391-0.807 0-0.208-0.099-0.625-0.307-1.26l-1.349-4.208h1.214l0.969 3.146c0.219 0.719 0.313 1.214 0.271 1.5 0.536-1.417 0.906-2.969 1.115-4.646zM29.484 25.161h-3.51v-7.375h1.182v6.469h2.328zM25.057 25.339l-1.354-0.667c0.12-0.099 0.234-0.208 0.339-0.333 0.578-0.672 0.865-1.677 0.865-3 0-2.443-0.958-3.661-2.875-3.661-0.938 0-1.672 0.307-2.198 0.927-0.573 0.677-0.865 1.677-0.865 2.995 0 1.297 0.255 2.245 0.766 2.854 0.469 0.542 1.172 0.818 2.115 0.818 0.349 0 0.672-0.042 0.964-0.13l1.766 1.031 0.484-0.833zM20.667 23.682c-0.302-0.479-0.448-1.25-0.448-2.313 0-1.859 0.563-2.786 1.693-2.786 0.589 0 1.026 0.224 1.302 0.667 0.297 0.484 0.448 1.245 0.448 2.297 0 1.87-0.568 2.813-1.693 2.813-0.594 0-1.026-0.224-1.307-0.667zM18.458 23.12c0 0.625-0.229 1.141-0.693 1.536-0.458 0.401-1.068 0.604-1.844 0.604-0.724 0-1.417-0.229-2.099-0.688l0.318-0.635c0.583 0.292 1.109 0.438 1.589 0.438 0.443 0 0.792-0.099 1.042-0.292 0.25-0.198 0.401-0.474 0.401-0.823 0-0.438-0.307-0.813-0.865-1.125-0.516-0.286-1.552-0.875-1.552-0.875-0.563-0.411-0.839-0.849-0.839-1.573 0-0.599 0.208-1.078 0.625-1.443 0.422-0.375 0.958-0.557 1.625-0.557 0.682 0 1.307 0.182 1.87 0.547l-0.286 0.635c-0.479-0.203-0.953-0.307-1.417-0.307-0.38 0-0.672 0.094-0.875 0.276s-0.328 0.411-0.328 0.698c0 0.438 0.313 0.813 0.885 1.135 0.526 0.286 1.583 0.891 1.583 0.891 0.578 0.406 0.865 0.844 0.865 1.557zM30.964 15.313c-0.714-0.016-1.266 0.057-1.729 0.255-0.13 0.052-0.344 0.052-0.365 0.219 0.073 0.073 0.083 0.188 0.146 0.286 0.109 0.177 0.292 0.417 0.464 0.542 0.188 0.146 0.375 0.292 0.568 0.417 0.349 0.214 0.74 0.339 1.083 0.552 0.193 0.125 0.391 0.286 0.583 0.417 0.099 0.068 0.161 0.188 0.286 0.229v-0.026c-0.063-0.078-0.078-0.193-0.141-0.286-0.089-0.089-0.177-0.167-0.266-0.255-0.26-0.349-0.578-0.651-0.927-0.901-0.286-0.193-0.911-0.464-1.026-0.792l-0.016-0.021c0.193-0.016 0.422-0.089 0.609-0.141 0.302-0.078 0.583-0.063 0.896-0.141 0.141-0.036 0.281-0.078 0.427-0.125v-0.078c-0.161-0.161-0.281-0.38-0.448-0.531-0.453-0.391-0.953-0.776-1.469-1.094-0.281-0.182-0.635-0.297-0.932-0.448-0.104-0.052-0.286-0.078-0.344-0.167-0.161-0.198-0.255-0.453-0.37-0.688-0.255-0.49-0.505-1.031-0.729-1.552-0.161-0.349-0.255-0.693-0.453-1.016-0.917-1.516-1.917-2.432-3.448-3.333-0.328-0.188-0.724-0.266-1.141-0.365-0.224-0.010-0.443-0.026-0.667-0.036-0.146-0.063-0.286-0.229-0.411-0.313-0.51-0.323-1.823-1.016-2.193-0.099-0.24 0.583 0.354 1.151 0.563 1.443 0.151 0.208 0.344 0.438 0.453 0.667 0.063 0.156 0.078 0.318 0.141 0.479 0.141 0.391 0.276 0.828 0.464 1.193 0.099 0.188 0.203 0.385 0.328 0.552 0.073 0.099 0.198 0.141 0.224 0.302-0.125 0.182-0.135 0.448-0.203 0.667-0.323 1.010-0.198 2.255 0.255 3 0.146 0.224 0.484 0.714 0.938 0.526 0.401-0.161 0.313-0.667 0.427-1.115 0.026-0.109 0.010-0.177 0.063-0.25v0.021c0.13 0.25 0.255 0.49 0.37 0.74 0.271 0.438 0.755 0.891 1.156 1.193 0.214 0.161 0.38 0.438 0.646 0.536v-0.026h-0.021c-0.057-0.078-0.13-0.115-0.203-0.177-0.161-0.161-0.339-0.359-0.469-0.536-0.37-0.5-0.703-1.052-0.995-1.62-0.146-0.281-0.271-0.583-0.385-0.859-0.052-0.104-0.052-0.266-0.141-0.318-0.135 0.193-0.333 0.359-0.427 0.604-0.172 0.38-0.188 0.854-0.255 1.344-0.031 0.010-0.016 0-0.031 0.021-0.286-0.073-0.385-0.365-0.49-0.615-0.271-0.635-0.313-1.651-0.083-2.38 0.063-0.188 0.328-0.776 0.224-0.953-0.057-0.172-0.234-0.271-0.328-0.406-0.12-0.167-0.24-0.38-0.323-0.568-0.214-0.5-0.318-1.052-0.552-1.552-0.104-0.229-0.292-0.469-0.443-0.682-0.172-0.24-0.359-0.411-0.49-0.693-0.047-0.099-0.109-0.26-0.036-0.365 0.016-0.073 0.052-0.099 0.125-0.12 0.115-0.099 0.448 0.026 0.563 0.083 0.328 0.13 0.604 0.255 0.88 0.443 0.125 0.089 0.26 0.255 0.422 0.302h0.188c0.286 0.063 0.604 0.016 0.87 0.099 0.474 0.151 0.901 0.37 1.286 0.609 1.167 0.745 2.125 1.797 2.776 3.052 0.109 0.203 0.156 0.391 0.255 0.604 0.182 0.443 0.417 0.885 0.604 1.307s0.365 0.849 0.635 1.198c0.135 0.188 0.667 0.286 0.911 0.38 0.177 0.083 0.453 0.156 0.609 0.25 0.307 0.188 0.609 0.401 0.896 0.609 0.146 0.099 0.589 0.323 0.615 0.5z'/>"];

exports.cibMysql = cibMysql;
//# sourceMappingURL=cib-mysql.js.map