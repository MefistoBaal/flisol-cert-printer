import React from 'react';

export default class StatisticsCharts extends React.Component {
    constructor(props) {
        super(props);
    }

    render() {
        return (
            <section className="statistic-chart">
                <div className="container">
                    <div className="row">
                        <div className="col-md-12">
                            <h3 className="title-5 m-b-35">statistics</h3>
                        </div>
                    </div>
                    <div className="row">
                        <div className="col-md-6 col-lg-4">
                            <div className="statistic-chart-1">
                                <h3 className="title-3 m-b-30">chart</h3>
                                <div className="chart-wrap">
                                    <canvas id="widgetChart5"/>
                                </div>
                                <div className="statistic-chart-1-note">
                                    <span className="big">10,368</span> <span>/ 16220 items sold</span>
                                </div>
                            </div>
                        </div>
                        <div className="col-md-6 col-lg-4">
                            <div className="top-campaign">
                                <h3 className="title-3 m-b-30">top campaigns</h3>
                                <div className="table-responsive">
                                    <table className="table table-top-campaign">
                                        <tbody>
                                        <tr>
                                            <td>1. Australia</td>
                                            <td>$70,261.65</td>
                                        </tr>
                                        <tr>
                                            <td>2. United Kingdom</td>
                                            <td>$46,399.22</td>
                                        </tr>
                                        <tr>
                                            <td>3. Turkey</td>
                                            <td>$35,364.90</td>
                                        </tr>
                                        <tr>
                                            <td>4. Germany</td>
                                            <td>$20,366.96</td>
                                        </tr>
                                        <tr>
                                            <td>5. France</td>
                                            <td>$10,366.96</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div className="col-md-6 col-lg-4">
                            <div className="chart-percent-2">
                                <h3 className="title-3 m-b-30">chart by %</h3>
                                <div className="chart-wrap">
                                    <canvas id="percent-chart2"/>
                                    <div id="chartjs-tooltip">
                                        <table></table>
                                    </div>
                                </div>
                                <div className="chart-info">
                                    <div className="chart-note">
                                        <span className="dot dot--blue"/> <span>products</span>
                                    </div>
                                    <div className="chart-note">
                                        <span className="dot dot--red"/> <span>Services</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        )
    }
}