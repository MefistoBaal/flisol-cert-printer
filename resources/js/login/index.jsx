import React from 'react';
import Swal from "sweetalert2";

export default class Login extends React.Component {
    constructor(props) {
        super(props);
        this.state = {
            isLogging: false
        };
        this.handleSubmitForm = this.handleSubmitForm.bind(this);
    }

    handleSubmitForm(event) {
        event.preventDefault();
        const Toast = Swal.mixin({
            toast: true,
            position: 'bottom-right',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: false,
            onOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer);
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        });
        fetch('/admin/login', {
            method: 'POST',
            body: new FormData(event.target),
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }

        }).then(response => {
            if (response.ok)
                return response.json();
            if (response.status === 422)
                Toast.fire({
                    icon: 'error',
                    title: 'Usuario no encontrado'
                })
        }).then(data => {
            Toast.fire({
                icon: 'success',
                title: 'Bienvenido ' + data.auth
            }).then(() => {
                location.replace('/admin')
            })
        });
    }

    render() {
        const {isLogging} = this.state;
        return (
            <div className="page-wrapper">
                <div className="page-content--bge5">
                    <div className="container">
                        <div className="login-wrap">
                            <div className="login-content">
                                <div className="login-logo align-content-center">
                                    <img src="images/flisol_negativo.png" alt="FliSol"/>
                                </div>
                                <div className="login-form">
                                    <p>Inicio de sesión administrativo</p>
                                    <form onSubmit={this.handleSubmitForm}>
                                        <div className="form-group">
                                            <input className="au-input au-input--full" type="email" name="email" required disabled={isLogging} placeholder="Email"/>
                                        </div>

                                        <div className="form-group">
                                            <input className="au-input au-input--full" type="password" name="password" required disabled={isLogging} placeholder="Contraseña"/>
                                        </div>
                                        <button className="au-btn au-btn--block au-btn--submit m-b-20" type="submit" disabled={isLogging}>Ingresar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        );
    }
}