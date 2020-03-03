import React from 'react';
import HeaderDesktop from "./components/headerDesktop";
import HeaderMobile from "./components/headerMobile";
import HeaderMobileChild from "./components/headerMobileChild";
import BreadCrumbs from "./components/breadcrumbs";
import WelcomeMessage from "./components/welcomeMessage";
import Statistics from "./components/statistics";
import StatisticsCharts from "./components/statisticsCharts";
import DataTables from "./components/dataTables";
import Footer from "./components/footer";

export default class HomeAdmin extends React.Component {
    constructor(props) {
        super(props);
        sessionStorage.setItem('adminPath', '/admin');
        console.log('adminPath')
    }

    render() {
        return (
            <div>
                <HeaderDesktop/>
                <HeaderMobile/>
                <HeaderMobileChild/>
                <div className="page-content--bgf7">
                    <BreadCrumbs/>
                    <WelcomeMessage/>
                    <Statistics/>
                    <StatisticsCharts/>
                    <DataTables/>
                    <Footer/>
                </div>
            </div>
        )
    }
}