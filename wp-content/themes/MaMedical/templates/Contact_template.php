<?php
/*
Template Name: Contact Template
*/
?>
<?php get_header() ?>

<div id="content">
    <div class="areaContact pageBG">
        <div class="contactIntro">
            <div class="inner">
                <p class="contactIntroText">医師への相談、MAオンライン・セカンドオピニオン面談予約、その他お問合せは<br
                        class="pc">下記のフォームから承ります。<br>電話でのお問合せは、サービスの利用に関してのみとさせていただきます。</p>
                <div class="boxBlue">
                    <h3 class="bBTitle">お電話でのお問合せは</h3>
                    <p class="bBSub">お客様専用電話窓口</p>
                    <div class="boxPhone">
                        <p class="phone acumin"><a href="tel:0120934844">0120-934-844</a></p>
                        <p class="address">電話受付時間　平日9:00-17:00</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- .contactIntro -->
        <div class="contactForm">
            <div class="inner">
                <h2 class="contactTitle"><span>医師への相談・面談予約・<br class="sp">その他お問合せフォーム</span></h2>
                <div class="form">
                    <form action="">
                        <div class="formField">
                            <div class="formLabel">お名前<span class="required">必須</span></div>
                            <div class="formInput">
                                <input type="text" name="your-name" class="inputText" placeholder="山田太郎">
                            </div>
                        </div>
                        <div class="formField">
                            <div class="formLabel">ふりがな<span class="required">必須</span></div>
                            <div class="formInput">
                                <input type="text" name="your-kata" class="inputText" placeholder="やまだたろう">
                            </div>
                        </div>
                        <div class="formField">
                            <div class="formLabel">住所<span class="required">必須</span></div>
                            <div class="formInput">
                                <div class="zipcode">
                                    <span class="zipLabel">〒</span><input type="text" name="your-zip"
                                        class="inputText inputTextZip" placeholder="920-0835">
                                </div>
                                <input type="text" name="your-address" class="inputText"
                                    placeholder="石川県金沢市東御影町42番１　卯辰山ガーデンヒルズ・ウエストヒル304号室">
                            </div>
                        </div>
                        <div class="formField">
                            <div class="formLabel">電話<span class="required">必須</span></div>
                            <div class="formInput">
                                <input type="text" name="your-phone" class="inputText" placeholder="090-0000-0000">
                            </div>
                        </div>
                        <div class="formField">
                            <div class="formLabel">メールアドレス<span class="required">必須</span></div>
                            <div class="formInput">
                                <input type="email" name="your-email" class="inputText" placeholder="info@example.jp">
                            </div>
                        </div>
                        <div class="formField">
                            <div class="formLabel">ご利用サービス<span class="required">必須</span></div>
                            <div class="formInput checkGuide">
                                <p class="guideText">クリックしていずれかをご選択ください</p>
                                <span class="inputCheckbox">
                                    <span class="wpcf7-list-item first">
                                        <label>
                                            <input type="radio" name="your-services[]" value="オンライン面談予約">
                                            <span class="wpcf7-list-item-label">オンライン面談予約</span>
                                        </label>
                                    </span>
                                    <span class="wpcf7-list-item">
                                        <label>
                                            <input type="radio" name="your-services[]" value="医師への相談（メールのみ）">
                                            <span class="wpcf7-list-item-label">医師への相談（メールのみ）</span>
                                        </label>
                                        <p class="note">※上記のサービスを選択し送信いただいた時点で、料金が発生することはございません。</p>
                                    </span>
                                    <span class="wpcf7-list-item last">
                                        <label>
                                            <input type="radio" name="your-services[]" value="その他お問合せ（無料）">
                                            <span class="wpcf7-list-item-label">その他お問合せ（無料）</span>
                                        </label>
                                        <p class="note">※サービスに関するお問合せや何科の医師に相談したらいいのか等のご相談はこちら</p>
                                    </span>
                                </span>
                            </div>
                        </div>
                        <div class="selectServices services1">
                            <div class="formField">
                                <div class="formLabel">面談希望日<span class="required">必須</span></div>
                                <div class="formInput">
                                    <input type="text" name="your-date" id="datepickerC" class="inputText inpuTextShort"
                                        placeholder="クリックして日付を選択">
                                    <p class="redNote">※面談日は本日より2週間後以降の日付をご選択ください。</p>
                                </div>
                            </div>
                            <div class="formField">
                                <div class="formLabel">ご相談したい病名</div>
                                <div class="formInput">
                                    <input type="text" name="your-dicuss-name" class="inputText"
                                        placeholder="病名をご記入ください">
                                </div>
                            </div>
                        </div>
                        <div class="selectServices">
                            <div class="formField">
                                <div class="formLabel">ご相談したい医師名<p class="note">※3名まで選択可</p>
                                </div>
                                <div class="formInput">
                                    <div class="toggleSection">
                                        <p class="togglebutton"><a href="javascript:;" class="hover">一覧から医師を選択</a></p>
                                        <div class="toggleContent">
                                            <span class="inputCheckbox">
                                                <span class="wpcf7-list-item first">
                                                    <label>
                                                        <input type="checkbox" name="your-doctor[]"
                                                            value="医師No.001　Y医師">
                                                        <span class="wpcf7-list-item-label">医師No.001　Y医師</span>
                                                    </label>
                                                    <p class="linkDetail"><a href="#" class="hover">Y医師のプロフィール</a></p>
                                                </span>
                                                <span class="wpcf7-list-item">
                                                    <label>
                                                        <input type="checkbox" name="your-doctor[]"
                                                            value="医師No.002　S医師">
                                                        <span class="wpcf7-list-item-label">医師No.002　S医師</span>
                                                    </label>
                                                    <p class="linkDetail"><a href="#" class="hover">S医師のプロフィール</a></p>
                                                </span>
                                                <span class="wpcf7-list-item">
                                                    <label>
                                                        <input type="checkbox" name="your-doctor[]"
                                                            value="医師No.003　T医師">
                                                        <span class="wpcf7-list-item-label">医師No.003　T医師</span>
                                                    </label>
                                                    <p class="linkDetail"><a href="#" class="hover">T医師のプロフィール</a></p>
                                                </span>
                                                <span class="wpcf7-list-item">
                                                    <label>
                                                        <input type="checkbox" name="your-doctor[]"
                                                            value="医師No.004　Y医師">
                                                        <span class="wpcf7-list-item-label">医師No.004　Y医師</span>
                                                    </label>
                                                    <p class="linkDetail"><a href="#" class="hover">Y医師のプロフィール</a></p>
                                                </span>
                                                <span class="wpcf7-list-item">
                                                    <label>
                                                        <input type="checkbox" name="your-doctor[]"
                                                            value="医師No.005　S医師">
                                                        <span class="wpcf7-list-item-label">医師No.005　S医師</span>
                                                    </label>
                                                    <p class="linkDetail"><a href="#" class="hover">S医師のプロフィール</a></p>
                                                </span>
                                                <span class="wpcf7-list-item">
                                                    <label>
                                                        <input type="checkbox" name="your-doctor[]"
                                                            value="医師No.006　T医師">
                                                        <span class="wpcf7-list-item-label">医師No.006　T医師</span>
                                                    </label>
                                                    <p class="linkDetail"><a href="#" class="hover">T医師のプロフィール</a></p>
                                                </span>
                                                <span class="wpcf7-list-item">
                                                    <label>
                                                        <input type="checkbox" name="your-doctor[]"
                                                            value="医師No.007　Y医師">
                                                        <span class="wpcf7-list-item-label">医師No.007　Y医師</span>
                                                    </label>
                                                    <p class="linkDetail"><a href="#" class="hover">Y医師のプロフィール</a></p>
                                                </span>
                                                <span class="wpcf7-list-item">
                                                    <label>
                                                        <input type="checkbox" name="your-doctor[]"
                                                            value="医師No.008　S医師">
                                                        <span class="wpcf7-list-item-label">医師No.008　S医師</span>
                                                    </label>
                                                    <p class="linkDetail"><a href="#" class="hover">S医師のプロフィール</a></p>
                                                </span>
                                                <span class="wpcf7-list-item">
                                                    <label>
                                                        <input type="checkbox" name="your-doctor[]"
                                                            value="医師No.009　T医師">
                                                        <span class="wpcf7-list-item-label">医師No.009　T医師</span>
                                                    </label>
                                                    <p class="linkDetail"><a href="#" class="hover">T医師のプロフィール</a></p>
                                                </span>
                                                <span class="wpcf7-list-item">
                                                    <label>
                                                        <input type="checkbox" name="your-doctor[]"
                                                            value="医師No.010　Y医師">
                                                        <span class="wpcf7-list-item-label">医師No.010　Y医師</span>
                                                    </label>
                                                    <p class="linkDetail"><a href="#" class="hover">Y医師のプロフィール</a></p>
                                                </span>
                                                <span class="wpcf7-list-item">
                                                    <label>
                                                        <input type="checkbox" name="your-doctor[]"
                                                            value="医師No.011　S医師">
                                                        <span class="wpcf7-list-item-label">医師No.011　S医師</span>
                                                    </label>
                                                    <p class="linkDetail"><a href="#" class="hover">S医師のプロフィール</a></p>
                                                </span>
                                                <span class="wpcf7-list-item last">
                                                    <label>
                                                        <input type="checkbox" name="your-doctor[]"
                                                            value="医師No.012　T医師">
                                                        <span class="wpcf7-list-item-label">医師No.012　T医師</span>
                                                    </label>
                                                    <p class="linkDetail"><a href="#" class="hover">T医師のプロフィール</a></p>
                                                </span>
                                            </span>
                                        </div>
                                    </div>
                                    <p class="labelOr">または</p>
                                    <span class="inputCheckbox inputCheckboxBg">
                                        <span class="wpcf7-list-item first last">
                                            <label>
                                                <input type="radio" name="your-recommend-doctor"
                                                    value="コーディネーターに医師の選択を依頼をする">
                                                <span class="wpcf7-list-item-label">コーディネーターに医師の選択を依頼をする</span>
                                            </label>
                                        </span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="selectServices services1">
                            <div class="formField">
                                <div class="formLabel">提供可能な資料</div>
                                <div class="formInput">
                                    <textarea name="your-material" class="inputTextArea"
                                        placeholder="レントゲンフィルム超音波検査の結果と画像　など"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="selectServices">
                            <div class="formField">
                                <div class="formLabel">ご相談内容詳細<span class="required">必須</span></div>
                                <div class="formInput">
                                    <textarea name="your-detail" class="inputTextArea inputTextAreaHight"
                                        placeholder="ご相談されたい内容を記述できる範囲でご記入ください"></textarea>
                                </div>
                            </div>
                            <div class="boxPrivacy">
                                <h3 class="priTtl">フォーム送信の際は、<span><a href="#">・利用規約</a></span><span><a
                                            href="#">・プライバシーポリシー</a>を</span></h3>
                                <h3 class="priStrong"><span>必ずご確認いただき、ご同意の上送信ください。</span></h3>
                                <div class="priContent">
                                    <p class="priText">
                                        ■　サービス利用規約<br><br>株式会社アソシエイツ・ジャパン（以下、「当社」といいます。）は、当社が運営するウェブサイト（MAセカンド・オピニオン/医師への相談に関するサービス　https●●●●　
                                        <br>以下、「当サイト」といいます）の提供サービス利用に関し、以下のとおり利用規約（以下、「本規約」といいます。）を定めます。<br><br>第1条
                                        定義<br><br>「本サービス」とは、当社が運営する当サイトの「オンライン面談によるセカンドオピニオンサービス、メールによる医師への相談サービス等」を意味します。<br><br>「利用者」とは、当サイトを閲覧する者、本サービスについて問合せる者、登録して本サービスを利用する者を指します。<br><br><br>【利用者の定義】<br>利用者とは、当サイトを閲覧する者、当サービスについて問合せする者、サービスを利用して医師とオンライン面談をする者を指します。<br><br>【利用規約の範囲】<br>利用者は当サイトのサービスの利用に関して適用される、以下の利用規約を承認するものとします。<br><br>【利用規約の変更】<br>利用規約は如何なる理由でも通知なしに変更する場合があります。<br><br>【サービスの変更・停止】<br>当社は、当サイトの全て又は一部のサービスをいつでも、予告なしに変更又は停止することができるものとします。内容変更後は、変更後の内容のみ有効とさせていただきます。サービスの変更又は停止に伴い、利用者に不利益や損害が発生した場合、当社は一切の責任を負わないものとします。<br><br>【責任の制約】<br>如何なる状況においても当社は、第三者を介したものも含め、本ソフトウェア又はサービスの利用者による使用又は誤用に対する責任を一切負いません。この責任の制約は、当社が、そのような損害の可能性について通告されていた場合であっても、それが保証、契約、故意又は無意識による不法行為、その他に基づいているかどうかによらず、直接、間接、付随、結果的、特殊、懲戒的および懲罰的損害賠償を回避するために適用されます。<br><br>この責任の制約は、損害が、第三者を介したものも含め、本ソフトウェア又はサービスの使用又は誤用および依存の結果であるか、本ソフトウェア又はサービスを使用できないためか、本ソフトウェア又はサービスの中断、一時停止、終了のいずれかの結果かにかかわらず、適用されます。この責任の制約は、権利侵害の防止方法による本質的目的の不履行にかかわらず法律で許容された最大の範囲で適用されます。<br><br>【免責条項】<br>当社は、当社サイトのデータ等の内容、当サイトに対して行われているリンクに関し、如何なる保証をするものではありません。
                                        当社サイトのデータ等の利用により万一何らかの損害が発生したとしても、当社は一切の責任を負いかねます。<br><br>当社は、当社サイトに掲載する情報について細心の注意を払っておりますが、その正確性、有用性、
                                        <br>安全性等に関して、如何なる保証もするものではありません。又、利用者がこれらの情報を利用されたこと、もしくはご利用になれなかったこと、又、
                                        当サイトをご利用になったことにより生じる如何なる損害について、当社は、何ら責任を負うものではありません。又、当社サイトの内容の変更・利用中断、および本規約の変更に起因して生じた如何なる損害についても、当社は一切責任を負わないものとします。<br><br>【禁止事項】<br>利用者は、当サイト及びサービスにおいて以下の行為をすることはできません。<br><br>・虚偽の情報を登録し、提供する行為<br>・第三者の著作権、商標権、プライバシー権、肖像権等すべての法的権利を侵害する行為<br>・犯罪的行為に結びつく行為<br>・公序良俗に反する行為<br>・反社会的活動に関する行為<br>・法令、公序良俗に反する行為、又はそのおそれのある行為<br>・当サイトで得た情報を利用しての営利を目的とした情報提供等の行為<br>・当サイトの運営の妨げとなる一切の行為<br><br>利用者は、当サービスより医師とオンライン面談する場合、一切の録音・撮影（写真・動画）を禁止するものとする。又、録音・撮影物ををＳＮＳ等に反映することも禁止するのもとする。<br><br>【知的財産権・著作権】<br>当社サイトに掲載される個々の文章、図形、画像、動画、ロゴマーク等（以下「コンテンツ等」といいます）に関する知的財産権
                                        （著作権、商標権などのすべての権利を指します。）は、
                                        当社に帰属します。<br><br>当社より事前に承諾を受けた場合を除いて、私的使用その他法律によって明示的に認められる範囲を超えてコンテンツ等やそれらに包含される内容（一部か全部かを問いません）を複製・改変・公開・送信・頒布・譲渡・貸与・使用許諾・転載・再利用することはできません。<br><br>【損害賠償】<br>利用者は、万一、上記禁止項目に違反したり、不正に当社に帰属する知的財産権を侵害し、当社及び登録いただいている面談医師に損害を与えた場合は、その被害に応じ1案件毎賠償金（500万円～）を請求するものとする。<br><br>【準拠法】<br>本規約の準拠法は日本国内法とします。<br><br>【裁判管轄】<br>当サイト、サービス及び利用規約に関して訴訟の必要が生じた場合は、<br>訴額に応じて金沢簡易裁判所または金沢地方裁判所を第一審の専属的合意管轄裁判所とします。<br><br><br>■　個人情報保護方針<br><br>https://●●●●●●●●/<br>（以下「本ウェブサイト」といいます）は、以下のとおり個人情報保護方針を定め、個人情報保護の仕組みを構築し、全従業員に個人情報保護の重要性の認識と取組みを徹底させることにより、個人情報の保護を推進致します。<br><br><br>【個人情報の管理】<br>本ウェブサイトは、お客さまの個人情報を正確かつ最新の状態に保ち、個人情報への不正アクセス・紛失・破損・改ざん・漏洩などを防止するため、セキュリティシステムの維持・管理体制の整備・社員教育の徹底等の必要な措置を講じ、安全対策を実施し個人情報の厳重な管理を行ないます。<br><br>【個人情報の利用目的】<br>本ウェブサイトでは、お客様からのお問い合わせ時に、お名前、e-mailアドレス、電話番号等の個人情報をご登録いただく場合がございますが、これらの個人情報はご提供いただく際の目的以外では利用いたしません。お客さまからお預かりした個人情報は、当社からのご連絡や業務のご案内やご質問に対する回答として、電子メールや資料のご送付に利用いたします。<br><br>【個人情報の第三者への開示・提供の禁止】<br>本ウェブサイトは、お客さまよりお預かりした個人情報を適切に管理し、次のいずれかに該当する場合を除き、個人情報を第三者に開示いたしません。<br>・お客さまの同意がある場合<br>・お客さまが希望されるサービスを行なうために、当社が業務を委託する業者に対して開示する場合<br>・法令に基づき開示することが必要である場合<br><br>【Googleアナリティクスの利用について】<br>本ウェブサイトは、その利用状況を把握するために、Googleアナリティクスを利用することがあります。Googleアナリティクスは、本ウェブサイトへのアクセス情報を個人を特定することなく収集します。<br>アクセス情報の収集方法および利用方法については、Googleアナリティクスサービス利用規約およびGoogleプライバシーポリシーによって定められています。<br>Googleアナリティクスについての詳細は、次のページをご参照ください。<br><br>http://www.google.com/analytics<br>（Google
                                        Analytics™は、Google
                                        Inc.の商標です。）<br><br><br>【個人情報の安全対策個人情報の安全対策】<br>本ウェブサイトは、個人情報の正確性及び安全性確保のために、セキュリティに万全の対策を講じています。<br><br>【ご本人の照会】<br>お客さまがご本人の個人情報の照会・修正・削除などをご希望される場合には、ご本人であることを確認の上、対応させていただきます。<br><br><br>【法令、規範の遵守と見直し】<br>本ウェブサイトは、保有する個人情報に関して適用される日本の法令、その他規範を遵守するとともに、本ポリシーの内容を適宜見直し、その改善に努めます。<br><br><br>・個人情報の取扱いに関するお問い合わせは、下記までご連絡ください。<br><br>株式会社アソシエイツ・ジャパン<br>〒920－0835
                                        石川県金沢市東御影町42番１<br>卯辰山ガーデンヒルズ・ウエストヒル304号室<br>TEL:076-213-5553
                                        FAX:076-213-5552<br>E-mail:info@medical-associates.jp</p>
                                </div>
                                <div class="formField">
                                    <div class="formInput">
                                        <span class="inputCheckbox">
                                            <span class="wpcf7-list-item first last">
                                                <label>
                                                    <input type="checkbox" name="your-confirm">
                                                    <span class="wpcf7-list-item-label">利用規約およびプライバシーポリシーに同意します。</span>
                                                </label>
                                            </span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <input type="submit" class="inputSubmit hover" value="確認画面へ">
                        </div>
                    </form>
                </div>
                <!-- .form -->
                <div class="contactThank">
                    <p class="contactText">ありがとうございます。 メールを送信いたしました。<br><br>通常、お問い合わせ後5営業日以内に <br
                            class="sp">ご返答・ご対応させていただいております。<br> 1週間以上お返事が届かない場合は、<br
                            class="sp">連絡先を誤って入力された可能性がございます。<br>その際は大変お手数ですが、再度ご連絡くださいますようお願い申し上げます。</p>
                </div>
                <!-- .contactThank -->
            </div>
        </div>
        <!-- .contactForm -->

    </div>
</div>
<!-- #content -->
<?php get_footer() ?>