<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
        <script src="/moarcloud/js/jquery-1.10.2.min.js"></script>
        <link href='//fonts.googleapis.com/css?family=Karla' rel='stylesheet' type='text/css'>
        <script type="text/javascript" src="invoice.js"></script>
        <link rel="stylesheet" type="text/css" href="icons.css"/>
        <link rel="stylesheet" type="text/css" href="invoice-common.css"/>
        <link rel="stylesheet" type="text/css" href="invoice-screen.css" media="screen"/>
        <link rel="stylesheet" type="text/css" href="invoice-print.css" media="print"/>
    </head>
    
    <body>
    
        
        <nav>
            <div class="container">
                <ul id="help" style="display:none;">
                    <li>Use ↹ key and Shift-↹  combination to navigate between fields</li>
                    <li>Use your web browser capability to Print into PDF</li>
                    <li>Amount fields are calculated automatically</li>
                    <li>Nothing is saved on the server</li>
                    <li>Empty fields are excluded in the printed version</li>
                    <li>VAT calculation is hidden until you specify VATIN</li>
                    <li>Several fields can be prefilled via URL fragment #key=value</li>
                    <li>Anything that is saved is stored in your browser's localStorage</li>
                    <li>Feel free to distribute this page :)</li>
                </ul>
            



                <div class="toolbar">
                    <h1>HTML5 invoice generator by <a href="mailto: info@itcollege.it">ccataldo</a></h1>
                    <button onclick="$('#help').toggle();">Halp!</button>                
                    <button onclick="window.print();" title="Use your browser's capability to print to PDF!">Print...</button>
                    <select id="language">
                        <option value="en">English</option>
                        <option value="et">Estonian</option>
                    </select>
                    
                    <select id="currency">
                        <option value="EUR">EUR</option>
                        <option value="USD">USD</option>
                    </select>
                </div>
            </div>
        </nav>
            
        <div id="page" class="a4">
            <div id="padding">
                <table class="fields">
                    <tr>
                        <td class="label translate" id="invoice_number_label">Invoice number:</td>
                        <td class="value"><input id="invoice_number"/></td>
                    </tr>
                    
                    <tr>
                        <td class="label translate">Invoice date:</td>
                        <td class="value"><input id="invoice_date"/></td>
                    </tr>
                </table>


                <div id="to" class="fields">
                    <h1>
                        <span class="translate">Invoice to</span>
                        <input id="to_company" placeholder="Chris Gmbh"/>
                    </h1>
                    <input class="icon regno print-display-none" id="to_company_regno" placeholder="12345678"/>
                    <input class="icon person print-display-none" id="to_contact" placeholder="Chris Webshop"/>
                    <input class="icon web print-display-none" id="to_company" placeholder="www.chriswebshop.com"/>
                    <input class="icon email print-display-none" id="to_email" placeholder="info@itcollege.ee"/>
                    <input class="icon address print-display-none" id="to_address" placeholder="_____, _____, ___, Estonia"/>
                    <input class="icon phone print-display-none" id="to_phone" placeholder="+372 555 555"/>
                </div>

                <div id="from" class="fields">
                    <h1>
                        <span class="translate">From</span>
                        <input id="from_company" value="Chris Gmbh"/>
                    </h1>
                    <input class="icon regno print-display-none" id="from_company_regno" value="12502161"/>
                    <input class="icon person print-display-none" id="from_contact" value="Christian Cataldo"/>
                    <input class="icon web print-display-none" id="from_company" value="www.chriswebshop.ee"/>
                    <input class="icon email print-display-none" id="from_email" value="info@itcollege.ee"/>
                    <input class="icon address print-display-none" id="from_address" value="Raja 4, 12616 Tallinn, Estonia"/>
                    <input class="icon phone print-display-none" id="from_phone" value="+372 555 555"/>
                </div>
                    
                

                <table id="list">
                    <tr>
                        <th class="translate">Item name</th>
                        <th class="quantity translate">Quantity</th>
                        <th class="price translate">Unit price</th>
                        <th class="amount translate">Amount</th>
                    </tr>
                    <tr>
                        <td class="product"><input type="text" value="Cubietruck (Dual-core 1GHz, 2GB RAM, 8GB Flash, 1GBps LAN)"/></td>
                        <td class="quantity"><input type="number" value="30"/></td>
                        <td class="price"><input type="number" value="169.00" min="0" step="0.05"/></td>
                        <td class="amount"><span class="value">5070.00</span> <span class="currency">EUR</span></td>
                    </tr>
                    <tr>
                        <td class="product"><input type="text" value="USB OTG cable, SATA cable, USB power cable, CPU heatsink"/></td>
                        <td class="quantity"><input type="number" value="30"/></td>
                        <td class="price"><input type="number" value="0.00" min="0" step="0.05"/></td>
                        <td class="amount"><span class="value">0.00</span> <span class="currency">EUR</span></td>
                    </tr>
                    <tr>
                        <td class="product"><input type="text" value="5V/2A EU adapter"/></td>
                        <td class="quantity"><input type="number" value="30"/></td>
                        <td class="price"><input type="number" value="0.00" min="0" step="0.05"/></td>
                        <td class="amount"><span class="value">0.00</span> <span class="currency">EUR</span></td>
                    </tr>
                    <tr>
                        <td class="product"><input type="text" value="Porting Estonian ID-card software stack, Chromium, MATE-desktop"/></td>
                        <td class="quantity"><input type="number" value="1"/></td>
                        <td class="price"><input type="number" value="0.00" min="0" step="0.05"/></td>
                        <td class="amount"><span class="value">0.00</span> <span class="currency">EUR</span></td>
                    </tr>
                    <tr>
                        <td class="product"><input type="text" value=""/></td>
                        <td class="quantity"><input type="number" value="0"/></td>
                        <td class="price"><input type="number" value="0.00" min="0" step="0.05"/></td>
                        <td class="amount"><span class="value">0.00</span> <span class="currency">EUR</span></td>
                    </tr>
                    <tr>
                        <td class="product"><input type="text" value=""/></td>
                        <td class="quantity"><input type="number" value="0"/></td>
                        <td class="price"><input type="number" value="0.00" min="0" step="0.05"/></td>
                        <td class="amount"><span class="value">0.00</span> <span class="currency">EUR</span></td>
                    </tr>
                    <tr>
                        <td class="product"><input type="text" value=""/></td>
                        <td class="quantity"><input type="number" value="0"/></td>
                        <td class="price"><input type="number" value="0.00" min="0" step="0.05"/></td>
                        <td class="amount"><span class="value">0.00</span> <span class="currency">EUR</span></td>
                    </tr>
                </table>

            
                <table id="results" class="fields">
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td class="label translate" id="subtotal_label">Subtotal:</td>
                        <td class="value" id="subtotal"><span id="subtotal_value">0.00</span> <span class="currency">EUR</span></td>
                    </tr>
                    
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td class="label" id="vat_label"><span class="translate">VAT</span> <input id="vat_percent" min="0" max="20" step="1" type="number" value="20"/>%:</td>
                        <td class="value" id="vat"><span id="vat_value">0.00</span> <span class="currency">EUR</span></td>
                    </tr>
                    
                    <tr>
                        <td class="label translate" id="due_date_label">Due date:</td>
                        <td class="value"><input id="due_date"/></td>
                        <td>&nbsp;</td>
                        <td class="label translate" id="amount_due_label">Amount due:</td>
                        <td class="value"><span id="amount_due">0.00</span> <span class="currency">EUR</span></td>
                    </tr>

                </table>


                
                <footer>
                    <hr/>


                    
                    <table id="credentials">
                        <tr id="from_vatin">
                            <th class="translate">VATIN:</th>
                            <td><input type="text" value="EE5555555"/></td>
                        </tr>

                        <tr id="from_eori">
                            <th class="translate">EORI:</th>
                            <td><input type="text" value="EE5555555"/></td>
                        </tr>

                        <tr id="from_iban">
                            <th class="translate">IBAN:</th>
                            <td><input type="text" value="EE5555555555555"/></td>
                        </tr>

                        <tr id="from_bank_name">
                            <th class="translate">Bank name:</th>
                            <td><input type="text" value="IT College Bank"/></td>
                        </tr>

                        <tr id="from_bank_address">
                            <th class="translate">Bank address:</th>
                            <td><input type="text" value="Raja 4, 12616 Tallinn, Estonia"/></td>
                        </tr>

                        
                        <tr id="from_swiftbic">
                            <th class="translate">SWIFT/BIC:</th>
                            <td><input type="text" value="ITC55555"/></td>
                        </tr>
                    </table>
                </footer>
            </div>
        </div>
    </body>
</html>
