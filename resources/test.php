<form method="POST" action="http://127.0.0.1:8000/stockout/stockout-store" accept-charset="UTF-8" file="">
    <input name="_token" type="hidden" value="dIYrvp8bP9n7vPYRvDAT1XAIvamnDnXD9WeEOtDS">
    <div class="form-group row ">
        <label for="customer" class="col-lg-2 control-label">Customer:</label>
        <div class="col-lg-10">
            <select id="customer" name="customer" class="form-control">
                <option selected="selected" value="">Select Customer....</option>
                <option value="1">Jasim Uddin</option>
            </select>
            <div class="error"></div>
        </div>
    </div>
    <div id="multi" class="multi multi-button button-small button-purple fill" style="position: relative; width: 100%;">
        <span class="button-text">Selected (5)</span>
        <ul class="multi-menu" style="overflow: hidden auto; max-height: 300px; display: none;">
            <li class="control">
                <a class="select-all-none">Select none</a>
            </li>
            <li class="list-items  selected">
                <a>
                    <span class="text">Dano</span>
                    <span class="check-mark">✔</span>
                </a>
            </li>
            <li class="list-items  selected">
                <a>
                    <span class="text">Lifebuoy</span>
                    <span class="check-mark">✔</span>
                </a>
            </li>
            <li class="list-items  selected">
                <a>
                    <span class="text">Nido</span>
                    <span class="check-mark">✔</span>
                </a>
            </li>
            <li class="list-items  selected">
                <a>
                    <span class="text">Pepsodent</span>
                    <span class="check-mark">✔</span>
                </a>
            </li>
            <li class="list-items  selected">
                <a>
                    <span class="text">Wheel</span>
                    <span class="check-mark">✔</span>
                </a>
            </li>
        </ul>
    </div>
    <div class="wrapper">
        <table class="table">
            <thead>
            <tr>
                <th>Product</th>
                <th>Order Qty.</th>
                <th>Lot</th>
                <th>Unit Price</th>
                <th>Available Qty</th>
                <th>Selling Unit Price</th>
                <th>Selling Quantity</th>
                <th>Total</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>Pepsodent</td>
                <input type="hidden" value="Pepsodent" name="product_name[]">
                <input type="hidden" value="1" name="product_id[]">
                <td>
                    <input type="text" size="4" name="order_qty[]">
                </td>
                <td class="my_custom">
                    <table>
                        <tbody>
                        <tr>
                            <td>Pepsodent/2019-01-30 19:54:12</td>
                        </tr>
                        <input type="hidden" value="Pepsodent/2019-01-30" 19:54:12="" name="lot[Pepsodent][]">
                        <input type="hidden" value="1" name="id[Pepsodent][]">
                        <tr>
                            <td>Pepsodent/2019-01-30 19:54:24</td>
                        </tr>
                        <input type="hidden" value="Pepsodent/2019-01-30" 19:54:24="" name="lot[Pepsodent][]">
                        <input type="hidden" value="5" name="id[Pepsodent][]">
                        <tr>
                            <td>Pepsodent/2019-01-30 19:55:21</td>
                        </tr>
                        <input type="hidden" value="Pepsodent/2019-01-30" 19:55:21="" name="lot[Pepsodent][]">
                        <input type="hidden" value="6" name="id[Pepsodent][]">
                        </tbody>
                    </table>
                </td>
                <td class="my_custom">
                    <table>
                        <tbody>
                        <tr>
                            <td>2</td>
                        </tr>
                        <input type="hidden" value="2" name="unit_price[Pepsodent][]">
                        <tr>
                            <td>2</td>
                        </tr>
                        <input type="hidden" value="2" name="unit_price[Pepsodent][]">
                        <tr>
                            <td>2</td>
                        </tr>
                        <input type="hidden" value="2" name="unit_price[Pepsodent][]">
                        </tbody>
                    </table>
                </td>
                <td class="my_custom">
                    <table>
                        <tbody>
                        <tr>
                            <td>10</td>
                        </tr>
                        <input type="hidden" value="10" name="current_quantity[Pepsodent][]">
                        <tr>
                            <td>23</td>
                        </tr>
                        <input type="hidden" value="23" name="current_quantity[Pepsodent][]">
                        <tr>
                            <td>97</td>
                        </tr>
                        <input type="hidden" value="97" name="current_quantity[Pepsodent][]">
                        </tbody>
                    </table>
                </td>
                <td>
                    <table>
                        <tbody>
                        <tr>
                            <td>
                                <input type="text" size="4" name="sell_un_pr[Pepsodent][]">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" size="4" name="sell_un_pr[Pepsodent][]">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" size="4" name="sell_un_pr[Pepsodent][]">
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </td>
                <td>
                    <table>
                        <tbody>
                        <tr>
                            <td>
                                <input type="text" size="4" name="sell_qty[Pepsodent][]">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" size="4" name="sell_qty[Pepsodent][]">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" size="4" name="sell_qty[Pepsodent][]">
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </td>
                <td>
                    <div class="pin"></div>
                </td>
            </tr>
            <tr>
                <td>Wheel</td>
                <input type="hidden" value="Wheel" name="product_name[]">
                <input type="hidden" value="2" name="product_id[]">
                <td>
                    <input type="text" size="4" name="order_qty[]">
                </td>
                <td class="my_custom">
                    <table>
                        <tbody>
                        <tr>
                            <td>Wheel/2019-01-30 19:54:12</td>
                        </tr>
                        <input type="hidden" value="Wheel/2019-01-30" 19:54:12="" name="lot[Wheel][]">
                        <input type="hidden" value="2" name="id[Wheel][]">
                        </tbody>
                    </table>
                </td>
                <td class="my_custom">
                    <table>
                        <tbody>
                        <tr>
                            <td>2</td>
                        </tr>
                        <input type="hidden" value="2" name="unit_price[Wheel][]">
                        </tbody>
                    </table>
                </td>
                <td class="my_custom">
                    <table>
                        <tbody>
                        <tr>
                            <td>25</td>
                        </tr>
                        <input type="hidden" value="25" name="current_quantity[Wheel][]">
                        </tbody>
                    </table>
                </td>
                <td>
                    <table>
                        <tbody>
                        <tr>
                            <td>
                                <input type="text" size="4" name="sell_un_pr[Wheel][]">
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </td>
                <td>
                    <table>
                        <tbody>
                        <tr>
                            <td>
                                <input type="text" size="4" name="sell_qty[Wheel][]">
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </td>
                <td>
                    <div class="pin"></div>
                </td>
            </tr>
            <tr>
                <td>Lifebuoy</td>
                <input type="hidden" value="Lifebuoy" name="product_name[]">
                <input type="hidden" value="3" name="product_id[]">
                <td>
                    <input type="text" size="4" name="order_qty[]">
                </td>
                <td class="my_custom">
                    <table>
                        <tbody>
                        <tr>
                            <td>Lifebuoy/2019-01-30 19:54:12</td>
                        </tr>
                        <input type="hidden" value="Lifebuoy/2019-01-30" 19:54:12="" name="lot[Lifebuoy][]">
                        <input type="hidden" value="3" name="id[Lifebuoy][]">
                        </tbody>
                    </table>
                </td>
                <td class="my_custom">
                    <table>
                        <tbody>
                        <tr>
                            <td>2</td>
                        </tr>
                        <input type="hidden" value="2" name="unit_price[Lifebuoy][]">
                        </tbody>
                    </table>
                </td>
                <td class="my_custom">
                    <table>
                        <tbody>
                        <tr>
                            <td>96</td>
                        </tr>
                        <input type="hidden" value="96" name="current_quantity[Lifebuoy][]">
                        </tbody>
                    </table>
                </td>
                <td>
                    <table>
                        <tbody>
                        <tr>
                            <td>
                                <input type="text" size="4" name="sell_un_pr[Lifebuoy][]">
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </td>
                <td>
                    <table>
                        <tbody>
                        <tr>
                            <td>
                                <input type="text" size="4" name="sell_qty[Lifebuoy][]">
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </td>
                <td>
                    <div class="pin"></div>
                </td>
            </tr>
            <tr>
                <td>Nido</td>
                <input type="hidden" value="Nido" name="product_name[]">
                <input type="hidden" value="4" name="product_id[]">
                <td>
                    <input type="text" size="4" name="order_qty[]">
                </td>
                <td class="my_custom">
                    <table>
                        <tbody>
                        <tr>
                            <td>Nido/2019-01-30 19:54:12</td>
                        </tr>
                        <input type="hidden" value="Nido/2019-01-30" 19:54:12="" name="lot[Nido][]">
                        <input type="hidden" value="4" name="id[Nido][]">
                        <tr>
                            <td>Nido/2019-01-30 19:55:21</td>
                        </tr>
                        <input type="hidden" value="Nido/2019-01-30" 19:55:21="" name="lot[Nido][]">
                        <input type="hidden" value="7" name="id[Nido][]">
                        </tbody>
                    </table>
                </td>
                <td class="my_custom">
                    <table>
                        <tbody>
                        <tr>
                            <td>4</td>
                        </tr>
                        <input type="hidden" value="4" name="unit_price[Nido][]">
                        <tr>
                            <td>2</td>
                        </tr>
                        <input type="hidden" value="2" name="unit_price[Nido][]">
                        </tbody>
                    </table>
                </td>
                <td class="my_custom">
                    <table>
                        <tbody>
                        <tr>
                            <td>200</td>
                        </tr>
                        <input type="hidden" value="200" name="current_quantity[Nido][]">
                        <tr>
                            <td>200</td>
                        </tr>
                        <input type="hidden" value="200" name="current_quantity[Nido][]">
                        </tbody>
                    </table>
                </td>
                <td>
                    <table>
                        <tbody>
                        <tr>
                            <td>
                                <input type="text" size="4" name="sell_un_pr[Nido][]">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" size="4" name="sell_un_pr[Nido][]">
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </td>
                <td>
                    <table>
                        <tbody>
                        <tr>
                            <td>
                                <input type="text" size="4" name="sell_qty[Nido][]">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" size="4" name="sell_qty[Nido][]">
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </td>
                <td>
                    <div class="pin"></div>
                </td>
            </tr>
            <tr>
                <td>Dano</td>
                <input type="hidden" value="Dano" name="product_name[]">
                <input type="hidden" value="5" name="product_id[]">
                <td>
                    <input type="text" size="4" name="order_qty[]">
                </td>
                <td class="my_custom">
                    <table>
                        <tbody>
                        <tr>
                            <td>Dano/2019-01-30 19:55:21</td>
                        </tr>
                        <input type="hidden" value="Dano/2019-01-30" 19:55:21="" name="lot[Dano][]">
                        <input type="hidden" value="8" name="id[Dano][]">
                        </tbody>
                    </table>
                </td>
                <td class="my_custom">
                    <table>
                        <tbody>
                        <tr>
                            <td>2</td>
                        </tr>
                        <input type="hidden" value="2" name="unit_price[Dano][]">
                        </tbody>
                    </table>
                </td>
                <td class="my_custom">
                    <table>
                        <tbody>
                        <tr>
                            <td>195</td>
                        </tr>
                        <input type="hidden" value="195" name="current_quantity[Dano][]">
                        </tbody>
                    </table>
                </td>
                <td>
                    <table>
                        <tbody>
                        <tr>
                            <td>
                                <input type="text" size="4" name="sell_un_pr[Dano][]">
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </td>
                <td>
                    <table>
                        <tbody>
                        <tr>
                            <td>
                                <input type="text" size="4" name="sell_qty[Dano][]">
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </td>
                <td>
                    <div class="pin"></div>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
    <div class="form-group row">
        <div class="col-lg-10 col-lg-offset-2">
            <input type="submit" value="Submit" class="btn btn-lg btn-info ">
            <button type="button" class="btn btn-lg btn-info alert-danger">
                <a href="http://127.0.0.1:8000/stockout">Cancel</a>
            </button>
        </div>
    </div>
</form>