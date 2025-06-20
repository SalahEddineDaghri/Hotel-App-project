{{-- <!-- Modal Login/Register Toggle -->
<div class="modal fade" id="authModal" tabindex="-1" aria-labelledby="authModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header border-0">
        <h5 class="modal-title" id="authModalLabel">Authentification</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
      </div>
      <div class="modal-body">

        <!-- Nav Tabs -->
        <ul class="nav nav-tabs mb-3 justify-content-center" id="authTab" role="tablist">
          <li class="nav-item" role="presentation">
            <button class="nav-link active" id="login-tab" data-bs-toggle="tab" data-bs-target="#login-pane" type="button" role="tab">
              Se connecter
            </button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="register-tab" data-bs-toggle="tab" data-bs-target="#register-pane" type="button" role="tab">
              S'inscrire
            </button>
          </li>
        </ul>

        <!-- Tab Panes -->
        <div class="tab-content">

          <!-- Login Pane -->
          <div class="tab-pane fade show active" id="login-pane" role="tabpanel">
            <form method="POST" action="{{ route('login') }}">
              @csrf
              <div class="mb-3">
                <label>Email</label>
                <input type="email" class="form-control" name="email" required>
              </div>
              <div class="mb-3">
                <label>Mot de passe</label>
                <input type="password" class="form-control" name="password" required>
              </div>
              <button type="submit" class="btn btn-primary w-100">Se connecter</button>
            </form>
          </div>

          <!-- Register Pane -->
          <div class="tab-pane fade" id="register-pane" role="tabpanel">
            <form method="POST" action="{{ route('register') }}">
              @csrf
              <div class="mb-3">
                <label>Nom</label>
                <input type="text" class="form-control" name="name" required>
              </div>
              <div class="mb-3">
                <label>Email</label>
                <input type="email" class="form-control" name="email" required>
              </div>
              <div class="mb-3">
                <label>Mot de passe</label>
                <input type="password" class="form-control" name="password" required>
              </div>
              <div class="mb-3">
                <label>Confirmer le mot de passe</label>
                <input type="password" class="form-control" name="password_confirmation" required>
              </div>
              <button type="submit" class="btn btn-success w-100">Créer un compte</button>
            </form>
          </div>

        </div>
      </div>
    </div>
  </div>
</div> --}}
