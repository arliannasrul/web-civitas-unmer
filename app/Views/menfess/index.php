

<?= $this->extend('layout/main') ?>

<?= $this->section('title') ?><?= esc($title) ?><?= $this->endSection() ?>

<?= $this->section('content') ?>
<div style="display: none;">
        <svg id="thumbs-up" viewBox="0 0 36 36" xmlns="http://www.w3.org/2000/svg">
            <g id="dasdasd" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path fill="#D4AB88" d="M34.956 17.916c0-.503-.12-.975-.321-1.404c-1.341-4.326-7.619-4.01-16.549-4.221c-1.493-.035-.639-1.798-.115-5.668c.341-2.517-1.282-6.382-4.01-6.382c-4.498 0-.171 3.548-4.148 12.322c-2.125 4.688-6.875 2.062-6.875 6.771v10.719c0 1.833.18 3.595 2.758 3.885C8.195 34.219 7.633 36 11.238 36h18.044a3.337 3.337 0 0 0 3.333-3.334c0-.762-.267-1.456-.698-2.018c1.02-.571 1.72-1.649 1.72-2.899c0-.76-.266-1.454-.696-2.015c1.023-.57 1.725-1.649 1.725-2.901c0-.909-.368-1.733-.961-2.336a3.311 3.311 0 0 0 1.251-2.581z"></path><path fill="#B68A60" d="M23.02 21.249h8.604c1.17 0 2.268-.626 2.866-1.633a.876.876 0 0 0-1.506-.892a1.588 1.588 0 0 1-1.361.775h-8.81c-.873 0-1.583-.71-1.583-1.583s.71-1.583 1.583-1.583H28.7a.875.875 0 0 0 0-1.75h-5.888a3.337 3.337 0 0 0-3.333 3.333c0 1.025.475 1.932 1.205 2.544a3.32 3.32 0 0 0-.998 2.373c0 1.028.478 1.938 1.212 2.549a3.318 3.318 0 0 0 .419 5.08a3.305 3.305 0 0 0-.852 2.204a3.337 3.337 0 0 0 3.333 3.333h5.484a3.35 3.35 0 0 0 2.867-1.632a.875.875 0 0 0-1.504-.894a1.594 1.594 0 0 1-1.363.776h-5.484c-.873 0-1.583-.71-1.583-1.583s.71-1.583 1.583-1.583h6.506a3.35 3.35 0 0 0 2.867-1.633a.875.875 0 1 0-1.504-.894a1.572 1.572 0 0 1-1.363.777h-7.063a1.585 1.585 0 0 1 0-3.167h8.091a3.35 3.35 0 0 0 2.867-1.632a.875.875 0 0 0-1.504-.894a1.573 1.573 0 0 1-1.363.776H23.02a1.585 1.585 0 0 1 0-3.167z"></path></g>
        </svg>

        <svg id="thumbs-down" viewBox="0 0 36 36" xmlns="http://www.w3.org/2000/svg">
            <g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path fill="#D4AB88" d="M34.956 18.084c0 .503-.12.975-.321 1.404c-1.341 4.326-7.619 4.01-16.549 4.221c-1.493.035-.639 1.798-.115 5.668c.341 2.517-1.282 6.382-4.01 6.382c-4.498 0-.171-3.548-4.148-12.322c-2.125-4.688-6.875-2.062-6.875-6.771V5.948c0-1.833.18-3.595 2.758-3.885C8.195 1.781 7.633 0 11.238 0h18.044a3.337 3.337 0 0 1 3.333 3.334c0 .762-.267 1.456-.698 2.018c1.02.571 1.72 1.649 1.72 2.899c0 .76-.266 1.454-.696 2.015c1.023.57 1.725 1.649 1.725 2.901c0 .909-.368 1.733-.961 2.336a3.311 3.311 0 0 1 1.251 2.581z"></path><path fill="#B68A60" d="M23.02 14.751h8.604c1.17 0 2.268.626 2.866 1.633a.876.876 0 0 1-1.506.892a1.588 1.588 0 0 0-1.361-.775h-8.81c-.873 0-1.583.71-1.583-1.583s.71-1.583 1.583-1.583H28.7a.875.875 0 0 1 0 1.75h-5.888a3.337 3.337 0 0 1-3.333-3.333c0-1.025.475-1.932 1.205-2.544a3.32 3.32 0 0 1-.998-2.373c0-1.028.478-1.938 1.212-2.549a3.318 3.318 0 0 1 .419-5.08a3.305 3.305 0 0 1-.852-2.204A3.337 3.337 0 0 1 23.798.001h5.484a3.35 3.35 0 0 1 2.867 1.632a.875.875 0 0 1-1.504.894a1.594 1.594 0 0 0-1.363-.776h-5.484c-.873 0-1.583.71-1.583 1.583s.71 1.583 1.583 1.583h6.506c1.17 0 2.27.626 2.867 1.633a.875.875 0 1 1-1.504.894a1.572 1.572 0 0 0-1.363-.777h-7.063a1.585 1.585 0 0 0 0 3.167h8.091a3.35 3.35 0 0 1 2.867 1.632a.875.875 0 0 1-1.504.894a1.573 1.573 0 0 0-1.363-.776H23.02a1.585 1.585 0 0 0 0 3.167z"></path></g>
        </svg>

        <svg id="fire" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
            <g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path fill="#FF8F1F" d="M266.91 500.44c-168.738 0-213.822-175.898-193.443-291.147c.887-5.016 7.462-6.461 10.327-2.249c8.872 13.04 16.767 31.875 29.848 30.24c19.661-2.458 33.282-175.946 149.807-224.761c3.698-1.549 7.567 1.39 7.161 5.378c-5.762 56.533 28.181 137.468 88.316 137.468c34.472 0 58.058-27.512 69.844-55.142c3.58-8.393 15.843-7.335 17.896 1.556c21.031 91.082 77.25 398.657-179.756 398.657z"></path><path fill="#FFB636" d="M207.756 330.827c3.968-3.334 9.992-1.046 10.893 4.058c2.108 11.943 9.04 32.468 31.778 32.468c27.352 0 45.914-75.264 50.782-97.399c.801-3.642 4.35-6.115 8.004-5.372c68.355 13.898 101.59 235.858-48.703 235.858c-109.412 0-84.625-142.839-52.754-169.613zM394.537 90.454c2.409-18.842-31.987 32.693-31.987 32.693s26.223 12.386 31.987-32.693zM47.963 371.456c.725-8.021-9.594-29.497-11.421-20.994c-4.373 20.344 10.696 29.016 11.421 20.994z"></path><path fill="#FFD469" d="M323.176 348.596c-2.563-10.69-11.755 14.14-10.6 24.254c1.155 10.113 16.731 1.322 10.6-24.254z"></path></g>
        </svg>

        <svg id="sad" viewBox="0 0 512.003 512.003" xmlns="http://www.w3.org/2000/svg">
            <g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <circle style="fill:#FDDF6D;" cx="256.001" cy="256.001" r="256.001"></circle> <path style="fill:#FCC56B;" d="M310.859,474.208c-141.385,0-256-114.615-256-256c0-75.537,32.722-143.422,84.757-190.281 C56.738,70.303,0,156.525,0,256c0,141.385,114.615,256,256,256c65.849,0,125.883-24.87,171.243-65.718 C392.325,464.135,352.77,474.208,310.859,474.208z"></path> <g> <circle style="fill:#7F184C;" cx="219.398" cy="211.927" r="31.243"></circle> <circle style="fill:#7F184C;" cx="395.305" cy="211.927" r="31.243"></circle> <path style="fill:#7F184C;" d="M369.694,430.737c-3.656,0.001-7.203-1.927-9.108-5.349c-9.763-17.527-28.276-28.415-48.313-28.415 c-19.528,0-38.25,10.998-48.865,28.702c-2.958,4.932-9.355,6.533-14.287,3.577c-4.934-2.958-6.535-9.354-3.577-14.287 c14.357-23.945,39.926-38.821,66.73-38.821c27.589,0,53.073,14.986,66.511,39.108c2.799,5.024,0.994,11.367-4.03,14.165 C373.149,430.313,371.409,430.737,369.694,430.737z"></path> </g> <path style="fill:#3FA9F5;" d="M249.003,345.027c0,17.825-14.45,32.275-32.275,32.275s-32.275-14.45-32.275-32.275 c0-17.825,32.275-64.31,32.275-64.31S249.003,327.203,249.003,345.027z"></path> <ellipse transform="matrix(0.2723 -0.9622 0.9622 0.2723 156.5499 349.394)" style="fill:#FCEB88;" cx="309.272" cy="71.196" rx="29.854" ry="53.46"></ellipse> </g>
        </svg>

        <svg id="laugh" viewBox="0 0 512.003 512.003" xmlns="http://www.w3.org/2000/svg">
            <g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <circle style="fill:#FDDF6D;" cx="256.001" cy="256.001" r="256.001"></circle> <path style="fill:#FCC56B;" d="M310.859,474.208c-141.385,0-256-114.615-256-256c0-75.537,32.722-143.422,84.757-190.281 C56.738,70.303,0,156.525,0,256c0,141.385,114.615,256,256,256c65.849,0,125.883-24.87,171.243-65.718 C392.325,464.135,352.77,474.208,310.859,474.208z"></path> <g> <path style="fill:#7F184C;" d="M422.988,229.321c-3.656,0.001-7.203-1.927-9.108-5.349c-6.682-11.995-19.35-19.446-33.064-19.446 c-13.374,0-26.214,7.561-33.512,19.733c-2.958,4.932-9.355,6.533-14.287,3.577c-4.934-2.958-6.535-9.354-3.577-14.287 c11.039-18.414,30.725-29.852,51.377-29.852c21.264,0,40.905,11.548,51.26,30.139c2.799,5.024,0.994,11.367-4.03,14.165 C426.443,228.896,424.703,229.321,422.988,229.321z"></path> <path style="fill:#7F184C;" d="M245.315,229.321c-3.656,0.001-7.203-1.927-9.108-5.349c-6.682-11.995-19.35-19.446-33.064-19.446 c-13.372,0-26.214,7.561-33.512,19.733c-2.956,4.932-9.352,6.533-14.287,3.577c-4.932-2.958-6.535-9.355-3.576-14.287 c11.039-18.414,30.725-29.852,51.377-29.852c21.264,0,40.905,11.548,51.26,30.139c2.799,5.024,0.994,11.367-4.03,14.165 C248.77,228.896,247.03,229.321,245.315,229.321z"></path> <path style="fill:#7F184C;" d="M294.45,445.098L294.45,445.098c-73.869,0-133.751-59.882-133.751-133.751l0,0h267.5l0,0 C428.2,385.216,368.318,445.098,294.45,445.098z"></path> </g> <path style="fill:#F2F2F2;" d="M193.334,311.347v20.878c0,8.804,7.136,15.94,15.94,15.94h170.353c8.802,0,15.94-7.136,15.94-15.94 v-20.878H193.334z"></path> <path style="fill:#FC4C59;" d="M297.258,389.609c-36.153-16.796-76.276-14.357-108.808,3.065 c24.448,31.863,62.891,52.424,106.157,52.424l0,0c19.065,0,37.185-4.016,53.598-11.205 C336.162,415.261,318.895,399.663,297.258,389.609z"></path> <g> <path style="fill:#3FA9F5;" d="M146.23,338.778c-15.627,17.091-42.149,18.279-59.242,2.652s-18.279-42.149-2.652-59.242 c15.627-17.092,87.325-33.368,87.325-33.368S161.857,321.688,146.23,338.778z"></path> <path style="fill:#3FA9F5;" d="M434.029,329.436c15.627,17.091,42.149,18.279,59.242,2.652 c17.091-15.627,18.279-42.149,2.652-59.242c-15.627-17.091-87.325-33.368-87.325-33.368S418.403,312.344,434.029,329.436z"></path> </g> <ellipse transform="matrix(0.2723 -0.9622 0.9622 0.2723 134.7066 334.6929)" style="fill:#FCEB88;" cx="288.63" cy="78.287" rx="29.854" ry="53.46"></ellipse> </g>
        </svg>

        <svg id="sorry" viewBox="0 0 36 36" xmlns="http://www.w3.org/2000/svg">
            <g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path fill="#50A5E6" d="M30 22c-3 0-6.688 7.094-7 10c-.421 3.915 2 4 2 4h11V26s-3.438-4-6-4z"></path><ellipse transform="rotate(-60 27.574 28.49)" fill="#1C6399" cx="27.574" cy="28.489" rx="5.848" ry="1.638"></ellipse><path fill="#CC9B7A" d="M20.086 0c1.181 0 2.138.957 2.138 2.138c0 .789.668 10.824.668 10.824L17.948 18V2.138C17.948.957 18.905 0 20.086 0z"></path><path fill="#D5AB88" d="M18.875 4.323c0-1.099.852-1.989 1.903-1.989c1.051 0 1.903.891 1.903 1.989c0 0 .535 5.942 1.192 9.37c.878 1.866 1.369 4.682 1.261 6.248c.054.398 5.625 5.006 5.625 5.006c-.281 1.813-2.259 6.155-4.759 8.159l-3.521-2.924c-2.885-.404-4.458-3.331-4.458-4.264c0-2.984.854-21.595.854-21.595z"></path><path fill="#50A5E6" d="M6 22c3 0 6.688 7.094 7 10c.421 3.915-2 4-2 4H0V26s3.438-4 6-4z"></path><ellipse transform="rotate(-30 8.424 28.489)" fill="#1C6399" cx="8.426" cy="28.489" rx="1.638" ry="5.848"></ellipse><path fill="#CC9B7A" d="M16.061.011a2.115 2.115 0 0 0-2.333 2.103c0 .78-.184 10.319-.184 10.319L17.895 18l.062-15.765c0-1.106-.795-2.114-1.896-2.224z"></path><path fill="#D5AB88" d="M17.125 4.323c0-1.099-.852-1.989-1.903-1.989c-1.051 0-1.903.891-1.903 1.989c0 0-.535 5.942-1.192 9.37c-.878 1.866-1.369 4.682-1.261 6.248c-.054.398-5.625 5.006-5.625 5.006C5.522 26.76 7.5 31.102 10 33.106l3.521-2.924c2.885-.404 4.458-3.331 4.458-4.264c0-2.984-.854-21.595-.854-21.595z"></path><path fill="#CC9B7A" d="M18 25.823a.75.75 0 0 1-.75-.75V2.792a.75.75 0 0 1 1.5 0v22.281a.75.75 0 0 1-.75.75z"></path></g>
        </svg>
    </div>
    <div class="row justify-content-center container">
        <div class="col-lg-6">
            <h1 class="text-center mb-4"><?= esc($title) ?></h1>
            <p class="text-center text-muted">Tempat untuk ungkapan, saran, kritik, atau gibahan anonim mahasiswa Universitas Merdeka Malang.</p>

            <div id="menfess-container" class="mt-5">
                <?php if (!empty($menfess)): ?>
                    <?php foreach ($menfess as $post): ?>
                       <div class="card mb-2 shadow-sm clickable-card" >
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-2">
                                    <div class="me-3">
                                        <i class="fas fa-user-circle fa-2x text-secondary"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-1">Anonymous <?= esc($post['anonymous_id']) ?></h6>
                                        <small class="text-muted"><?= date('d F Y', strtotime($post['created_at'])) ?></small>
                                    </div>
                                </div>
                                <a class="card-text mb-2 text-decoration-none text-black" href="<?= base_url('menfess/' . esc($post['id'])) ?>"><?= nl2br(esc($post['content'])) ?></a>
                                <?php if ($post['image']): ?>
                                    <img src="/uploads/menfess/<?= esc($post['image']) ?>" class="img-fluid rounded mb-2" alt="Gambar menfess">
                                <?php endif; ?>
                                
<div class="d-flex justify-between align-items-center mt-3 ">
    <div class="d-flex align-items-center gap-3"> 
        <?php if ($post['likes_count'] > 0): ?>
            <div class="d-flex align-items-center">
                <svg width="25" class="icon" viewBox="0 0 36 36">
                    <use href="#thumbs-up"></use>
                </svg>
                <span class="ms-1" id="likes-count-<?= esc($post['id']) ?>"><?= esc($post['likes_count']) ?></span>   
            </div>
        <?php endif; ?>
        <?php if ($post['dislike_count'] > 0): ?>
            <div class="d-flex align-items-center">
                <svg width="25" class="icon" viewBox="0 0 36 36">
                    <use href="#thumbs-down"></use>
                </svg>
                <span class="ms-1" id="dislike-count-<?= esc($post['id']) ?>"><?= esc($post['dislike_count']) ?></span>
            </div>
        <?php endif; ?>
        <?php if ($post['fire_count'] > 0): ?>
            <div class="d-flex align-items-center">
                <svg width="25" class="icon" viewBox="0 0 512 512">
                    <use href="#fire"></use>
                </svg>
                <span class="ms-1" id="fire-count-<?= esc($post['id']) ?>"><?= esc($post['fire_count']) ?></span>
            </div>
        <?php endif; ?>
        <?php if ($post['sad_count'] > 0): ?>
            <div class="d-flex align-items-center">
                <svg width="25" class="icon" viewBox="0 0 512.003 512.003">
                    <use href="#sad"></use>
                </svg>
                <span class="ms-1" id="sad-count-<?= esc($post['id']) ?>"><?= esc($post['sad_count']) ?></span>
            </div>
        <?php endif; ?>
        <?php if ($post['laugh_count'] > 0): ?>
            <div class="d-flex align-items-center">
                <svg width="25" class="icon" viewBox="0 0 512.003 512.003">
                    <use href="#laugh"></use>
                </svg>
                <span class="ms-1" id="laugh-count-<?= esc($post['id']) ?>"><?= esc($post['laugh_count']) ?></span>
            </div>
        <?php endif; ?>
        <?php if ($post['sorry_count'] > 0): ?>
            <div class="d-flex align-items-center">
                <svg width="25" class="icon" viewBox="0 0 36 36">
                    <use href="#sorry"></use>
                </svg>
                <span class="ms-1" id="sorry-count-<?= esc($post['id']) ?>"><?= esc($post['sorry_count']) ?></span>
            </div>
        <?php endif; ?>
    </div>
</div>
<hr>
                               
                                <div class="d-flex justify-content-center align-items-center gap-2 mt-1">
                                    <div class="reaction-wrapper position-relative ">
                                        <button class="btn btn-light react-toggle-button align-items-center " data-id="<?= esc($post['id']) ?>">
                                            <i class="far fa-thumbs-up me-2"></i>Suka
                                        </button>
                                          <a href="https://api.whatsapp.com/send?text=<?= urlencode('Lihat menfess ini: ' . base_url('menfess/' . esc($post['id']))) ?>" target="_blank" class="btn btn-outline-success">
                                        <i class="fab fa-whatsapp"></i> Bagikan
                                    </a>
                                        <div class="reaction-popup gap-2 gap-md-4 position-absolute rounded-pill p-2 bg-light shadow-lg z-3">
                                            <button class="btn btn-lg btn-light reaction-button " data-id="<?= esc($post['id']) ?>" data-reaction="likes" data-icon="thumbs-up" data-label="Setuju"><svg class="icon text-primary " width="35" height="35">
        <use href="#thumbs-up"></use>
    </svg></button>
                                            <button class="btn btn-lg btn-light reaction-button" data-id="<?= esc($post['id']) ?>" data-reaction="dislike" data-icon="thumbs-down" data-label="Tidak Setuju"><svg class="icon text-primary " width="35" height="35">
        <use href="#thumbs-down"></use>
    </svg></button>
                                            <button class="btn btn-lg btn-light reaction-button" data-id="<?= esc($post['id']) ?>" data-reaction="fire" data-icon="fire" data-label="Menyala King"><svg class="icon text-primary " width="35" height="35">
        <use href="#fire"></use>
    </svg></button></button>
                                            <button class="btn btn-lg btn-light reaction-button" data-id="<?= esc($post['id']) ?>" data-reaction="sad" data-icon="sad" data-label="Mengsedih"><svg class="icon text-primary " width="35" height="35">
        <use href="#sad"></use>
    </svg></button></button>
                                            <button class="btn btn-lg btn-light reaction-button" data-id="<?= esc($post['id']) ?>" data-reaction="laugh" data-icon="laugh" data-label="wkwk"><svg class="icon text-primary " width="35" height="35">
        <use href="#laugh"></use>
    </svg></button></button>
                                            <button class="btn btn-lg btn-light reaction-button" data-id="<?= esc($post['id']) ?>" data-reaction="sorry" data-icon="sorry" data-label="Sorry ye"><svg class="icon text-primary " width="35" height="35">
        <use href="#sorry"></use>
    </svg></button></button>
                                        </div>
                                    </div>
                                  
                                    
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="alert alert-info text-center" role="alert">
                        Belum ada menfess yang tersedia saat ini.
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>


<?= $this->section('scripts') ?>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const reactedMenfess = JSON.parse(localStorage.getItem('reactedMenfess')) || {};

        document.querySelectorAll('.react-toggle-button').forEach(button => {
            const menfessId = button.dataset.id;
            const reactionPopup = button.parentElement.querySelector('.reaction-popup');

            // Perbaikan: Hapus logika ikon Font Awesome
            if (reactedMenfess[menfessId]) {
                const reaction = reactedMenfess[menfessId];
                button.innerHTML = `<svg width="20" height="20" class="icon me-2"><use href="#${reaction.icon}"></use></svg> ${reaction.label}`;
                button.classList.add('disabled');
            }

            button.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();

                document.querySelectorAll('.reaction-popup').forEach(popup => {
                    if (popup !== reactionPopup) {
                        popup.style.display = 'none';
                    }
                });

                if (this.classList.contains('disabled')) {
                    return;
                }

                if (reactionPopup.style.display === 'none' || reactionPopup.style.display === '') {
                    reactionPopup.style.display = 'flex';
                } else {
                    reactionPopup.style.display = 'none';
                }
            });
        });

        document.body.addEventListener('click', function(e) {
            if (!e.target.closest('.reaction-wrapper')) {
                document.querySelectorAll('.reaction-popup').forEach(popup => {
                    popup.style.display = 'none';
                });
            }
        });

        // Event listener untuk setiap tombol reaksi di dalam pop-up
        document.querySelectorAll('.reaction-button').forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();

                const menfessId = this.dataset.id;
                const reactionType = this.dataset.reaction;
                const reactionLabel = this.dataset.label;
                const reactionIcon = this.dataset.icon;
                
                if (reactedMenfess[menfessId]) {
                    return;
                }

                const url = `<?= base_url('menfess/react/') ?>${menfessId}/${reactionType}`;

                fetch(url, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    }
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    if (data.new_count !== undefined) {
                        // Perbarui jumlah reaksi di halaman, ID span disesuaikan
                        const countSpan = document.getElementById(`${reactionType}-count-${menfessId}`);
                        if (countSpan) {
                            countSpan.textContent = data.new_count;
                        }

                        const reactionData = {
                            type: reactionType,
                            label: reactionLabel,
                            icon: reactionIcon
                        };
                        reactedMenfess[menfessId] = reactionData;
                        localStorage.setItem('reactedMenfess', JSON.stringify(reactedMenfess));
                        
                        const toggleButton = document.querySelector(`.react-toggle-button[data-id="${menfessId}"]`);
                        if (toggleButton) {
                            toggleButton.innerHTML = `<svg width="20" height="20" class="icon me-2"><use href="#${reactionIcon}"></use></svg> ${reactionLabel}`;
                            toggleButton.classList.add('disabled');
                        }

                        const reactionPopup = button.closest('.reaction-popup');
                        if (reactionPopup) {
                            reactionPopup.style.display = 'none';
                        }
                    }
                })
                .catch(error => {
                    console.error('Error saat memberikan reaksi:', error);
                    alert('Terjadi kesalahan saat memberikan reaksi.');
                });
            });
        });
    });
</script>
<?= $this->endSection() ?>
